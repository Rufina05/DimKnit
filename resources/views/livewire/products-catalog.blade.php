<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="relative rounded-md shadow-md overflow-hidden bg-white">

            <!-- Изображение с ссылкой на продукт -->
            <a href="{{ route('show-product', $product->slug_en) }}" class="block relative">
                <div class="relative group bg-gray-100 h-[300px] w-full flex justify-center items-center overflow-hidden">
                    <img src="{{ asset('storage/products/' . $product->main_image) }}" 
                         alt="{{ $product->name_en }}"  
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                    
                    <!-- Add to Cart: появляется при ховере на изображении -->
                    <div class="absolute bottom-0 left-0 right-0 py-2 bg-black bg-opacity-70
                                text-white flex justify-center items-center opacity-0
                                group-hover:opacity-100 transition-opacity duration-200 z-10">
                        @livewire("add-to-cart", 
                            ["productId" => $product->id, "showQuantitySelector" => false], 
                            key("cart-{$product->id}-{$loop->index}")
                        )
                    </div>
                </div>
            </a>

            <!-- Product Info -->
            <div class="space-y-1 p-3 mt-2">
                <p class="text-md md:text-lg font-semibold">{{ $product->name_en }}</p>
                <p class="flex items-center gap-2">
                    <span class="text-red-500">€{{ number_format($product->price, 2) }}</span>
                    @if($product->original_price && $product->original_price > $product->price)
                        <span class="text-gray-400 line-through text-sm">
                            €{{ number_format($product->original_price, 2) }}
                        </span>
                    @endif
                </p>
            </div>

            <!-- Heart Button (вне ссылки) -->
            <div class="absolute top-3 right-3 z-30">
                @livewire("add-to-heart", 
                    ["productId" => $product->id], 
                    key("heart-{$product->id}-{$loop->index}"))
            </div>

        </div>
    @endforeach
</section>
