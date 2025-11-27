<section class="w-full flex-1">
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
            <div class="bg-white rounded-md shadow-md overflow-hidden group relative">

                <div class="relative bg-gray-100 
                            h-[350px] sm:h-[350px] md:h-[320px] lg:h-[280px]
                            flex justify-center items-center overflow-hidden">

                    <a href="{{ route('show-product', $product->slug_en) }}" class="block w-full h-full">
                        <img src="{{ asset('storage/products/' . $product->main_image) }}"
                             class="object-contain w-full h-full transition-transform duration-300 group-hover:scale-105">
                    </a>

                    <div class="absolute bottom-0 left-0 right-0 
                                py-3 bg-black bg-opacity-70 text-white flex justify-center 
                                opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                        @livewire("add-to-cart", 
                            ["productId" => $product->id, "showQuantitySelector" => false], 
                            key("catalog-cart-{$product->id}-{$loop->index}"))
                    </div>

                    <div class="absolute top-3 right-3 z-20">
                        @livewire("add-to-heart", 
                            ["productId" => $product->id], 
                            key("catalog-heart-{$product->id}-{$loop->index}"))
                    </div>

                </div>

                <div class="space-y-2 py-3 px-2">
                    <p class="text-md font-bold md:text-lg">{{ $product->name_en }}</p>

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
