<div>
    <section class="w-full flex-1">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-md shadow-md overflow-hidden group relative">

                {{-- Карточка продукта --}}
                <div class="relative bg-gray-100 h-[280px] sm:h-[350px] md:h-80 flex justify-center items-center overflow-hidden">
                    {{-- Ссылка на страницу продукта --}}
                    <a href="{{ route('show-product', $product->slug) }}" class="block w-full h-full">
                        <img src="{{ asset('storage/' . $product->main_image) }}" 
                             class="object-contain w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </a>

                    {{-- Кнопки админа --}}
                    @if(auth()->check() && auth()->user()->is_admin)
                        <div class="absolute top-3 right-3 z-20 flex flex-col items-end gap-2">
                            {{-- Отправляем ID продукта в одну модалку Livewire --}}
                            <button 
                                wire:click="$dispatch('edit-product', { id: {{ $product->id }} })"
                                class="px-2 py-1 text-white bg-red-900 rounded hover:bg-white hover:text-red-900 border border-red-900 transition"
                            >
                                {{ __('text.edit') }}
                            </button>

                            @livewire('admin.delete-product', ['productId' => $product->id], key('delete-product-'.$product->id))
                        </div>
                    @else
                        {{-- Для обычного пользователя --}}
                        <div class="absolute top-3 right-3 z-20">
                            @livewire("add-to-heart", ["productId" => $product->id], key("catalog-heart-{$product->id}"))
                        </div>
                    @endif

                    {{-- Нижняя зона с корзиной для обычного пользователя --}}
                    @if(!auth()->check() || !auth()->user()->is_admin)
                        <div class="absolute bottom-0 left-0 right-0 py-3 bg-black bg-opacity-70 text-white flex justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                            @livewire("add-to-cart", ["productId" => $product->id, "showQuantitySelector" => false], key("catalog-cart-{$product->id}"))
                        </div>
                    @endif

                </div>

                {{-- Информация о продукте --}}
                <div class="space-y-2 py-3 px-2">
                    <p class="text-md font-bold md:text-lg">{{ $product->name }}</p>
                    <p class="flex items-center gap-2">
                        <span class="text-red-500 font-bold">€{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-gray-400 line-through text-sm">
                                €{{ number_format($product->original_price, 2) }}
                            </span>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</section>

@livewire('admin.edit-product', ['productId' => null])


</div>