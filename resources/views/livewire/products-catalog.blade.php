<section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="group rounded-md shadow-md overflow-hidden relative bg-white">

            <!-- Entire Card Clickable -->
            <a href="{{ route('show-product', $product->slug_en) }}" class="block relative">

                <!-- Product Image Section -->
                <div class="bg-gray-100 h-[300px] w-full flex justify-center items-center relative overflow-hidden">
                    <img src="{{ asset('storage/products/' . $product->main_image) }}" 
                         alt="{{ $product->name_en }}" 
                         class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-105">
                </div>

                <!-- Card Details -->
                <div class="space-y-1 p-3">
                    <p class="text-md md:text-lg font-semibold">{{ $product->name_en }}</p>
                    <p class="flex items-center gap-2">
                        <span class="text-red-500">€{{ number_format($product->price, 2) }}</span>
                        @if($product->original_price && $product->original_price > $product->price)
                            <span class="text-gray-400 line-through text-sm">€{{ number_format($product->original_price, 2) }}</span>
                        @endif
                    </p>
                </div>

            </a>

            <!-- Heart / Favorite Button -->
            <div class="absolute top-3 right-3 flex flex-col gap-2 z-10">
                @livewire("add-to-heart", ["productId" => $product->id], key('heart-catalog'.$product->id))
            </div>

            <!-- Add to Cart Hover -->
            <div class="absolute bottom-0 right-0 left-0 py-3 bg-black bg-opacity-70 text-white justify-center items-center flex opacity-0 group-hover:opacity-100 transition-opacity duration-200 z-10">
                @livewire("add-to-cart", ["productId" => $product->id], key('cart-catalog'.$product->id))
            </div>

        </div>
    @endforeach
</section>
