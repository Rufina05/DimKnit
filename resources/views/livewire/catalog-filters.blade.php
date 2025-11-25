
   <section class="flex-1 grid gap-5 grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
    @foreach($products as $product)
        <!-- Product Card -->
        <div class="relative flex flex-col items-start gap-4 w-[270px] h-auto rounded-[4px] bg-[#F5F5F5] p-4">

            <!-- Heart top-right -->
            <div class="absolute top-2 right-2 w-[34px] h-[34px] bg-white flex items-center justify-center rounded-full shadow">
                @livewire("add-to-heart", ["productId"=>$product->id], key('heart-'.$product->id))
            </div>

            <!-- CLICKABLE PRODUCT AREA -->
            <a href="{{ route('show-product', $product->slug_en) }}" wire:navigate class="flex flex-col items-start gap-2">
                <div class="w-[191px] h-[101px] flex-shrink-0 rounded-md bg-gray-200 bg-no-repeat bg-center bg-cover"
                     style="background-image: url('{{ asset('storage/products/' . $product->main_image) }}');">
                </div>

                <div class="flex flex-col items-start gap-2">
                    <p class="font-medium text-[16px] leading-[24px] text-gray-800 font-poppins">{{ $product->name_en }}</p>
                    <p class="font-semibold text-red-600 text-[16px] leading-[24px]">€{{ number_format($product->price, 2) }}</p>
                </div>
            </a>

            <!-- Add to Cart Button full-width -->
            <div class="mt-auto w-full">
                @livewire("add-to-cart", ["productId"=>$product->id], key('cart-'.$product->id))
            </div>

        </div>
    @endforeach
</section>

