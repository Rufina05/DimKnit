@extends("layout")

@section("main")

<div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
        <span>Home / Favorites </span>
</div>

<div class="grid grid-cols-12 gap-4 relative">
    <div class="col-span-12">
        <section class="my-14 md:mt-14 md:mb-20">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">

                <!-- Heading -->
                <div class="flex justify-between items-center pt-5">
                    <p class="text-black text-3xl ">
                        Wishlist ({{ $heart->heartItems->count() }})
                    </p>
                </div>

                <!-- Cards Section -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                    @foreach ($heart->heartItems as $item)

                        <div>
                            <div class="bg-gray-100 
                                        h-[350px] sm:h-[350px] md:h-[320px] lg:h-[280px]
                                        w-full rounded-md flex justify-center items-center 
                                        relative group overflow-hidden">

                                <!-- Product Image -->
                                <img src="{{ asset('storage/products/' . $item->product->main_image) }}"
                                     alt="{{ $item->product->name_en }}"
                                     class="object-contain max-h-full max-w-full">

                               <!-- Add to Cart (hover) -->
                                <div class="opacity-0 pointer-events-none group-hover:opacity-100 group-hover:pointer-events-auto duration-200 absolute bottom-0 right-0 left-0 py-3 bg-black text-white flex justify-center">
                                @livewire("add-to-cart", ["productId"=>$item->product->id], key('cart-catalog'.$item->id))
                            </div>


                                <!-- Remove From Heart -->
                                <div class="absolute top-3 right-3">
                                    <div class="h-8 w-8 rounded-full bg-white text-red-900 hover:bg-red-900
                                                hover:text-white duration-200 flex justify-center items-center">
                                        @livewire('remove-from-heart', ['productId' => $item->product->id], key('remove-'.$item->id))
                                    </div>
                                </div>
                            </div>

                            <!-- Card Details -->
                            <div class="space-y-2 py-3">
                                <p class="text-md font-bold md:text-lg">
                                    {{ $item->product->name_en }}
                                </p>

                                <p>
                                    <span class="text-red-500 font-bold">€{{ $item->product->price }}</span>

                                </p>
                            </div>

                        </div>

                    @endforeach

                </div>

            </div>
        </section>
    </div>
</div>

<div>
    @livewire('coming-soon-images')
</div>

@endsection
