@extends("layout")

@section("main")

<div class="grid grid-cols-12 gap-4 relative">
    <div class="col-span-12">
        <section class="my-14 md:mt-14 md:mb-20">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">

                <!-- Заголовок Wishlist -->
                <div class="flex justify-between items-center pt-5">
                    <p class="text-black text-3xl">
                        Wishlist ({{ $heart->heartItems->count() }})
                    </p>
                </div>

                <!-- Сетка продуктов -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">
                    @foreach ($heart->heartItems as $item)
                        <div class="bg-white rounded-md shadow-md overflow-hidden group">

                            <!-- Изображение + overlay кнопки -->
                            <div class="relative bg-gray-100 h-[350px] sm:h-[350px] md:h-[320px] lg:h-[280px] flex justify-center items-center overflow-hidden">

    <!-- Product Image (clickable) -->
    <a href="{{ route('show-product', $item->product->slug_en) }}" wire:navigate class="block w-full h-full">
        <img src="{{ asset('storage/products/' . $item->product->main_image) }}" 
             alt="{{ $item->product->name_en }}" 
             class="object-contain w-full h-full">
    </a>

    <!-- Add to Cart Button (hover) -->
    <div class="absolute bottom-0 left-0 right-0 py-3 bg-black bg-opacity-70 text-white flex justify-center opacity-0 
                group-hover:opacity-100 transition-opacity duration-200 z-10 pointer-events-auto">
        @livewire("add-to-cart", ["productId"=>$item->product->id, "showQuantitySelector" => false], key('cart-catalog'.$item->id))
    </div>

    <!-- Heart / Remove Button -->
    <div class="absolute top-3 right-3 z-20">
        <button wire:click="removeFromHeart" wire:loading.attr="disabled" class="h-8 w-8 rounded-full bg-white text-red-900 hover:bg-red-900 hover:text-white flex justify-center items-center">
            <span wire:loading.remove><x-monoicon-delete class="w-4 h-4"/></span>
            <span wire:loading class="text-sm">...</span>
        </button>
    </div>

</div>


                            <!-- Product Info -->
                            <div class="space-y-2 py-3 px-2">
                                <p class="text-md font-bold md:text-lg">{{ $item->product->name_en }}</p>
                                <p><span class="text-red-500 font-bold">€{{ $item->product->price }}</span></p>
                            </div>

                        </div>
                    @endforeach
                </div>

            </div>
        </section>
    </div>
</div>

<!-- Дополнительно -->
<div>
    @livewire('coming-soon-images')
</div>

@endsection
