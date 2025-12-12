<div class="py-16"> 
    <div class="max-w-7xl mx-auto px-4 lg:px-8">

            <div class="flex items-center gap-4">
                <div class="w-4 h-8 bg-red-500 rounded-md"></div>
                <p class="text-red-500 uppercase tracking-wider font-semibold">{{ __('text.this-month') }}</p>
            </div>
            <div class="py-4">
                <p class="text-3xl md:text-4xl font-semibold mb-8">{{ __('text.coming-soon-products') }}</p>
            </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @foreach($images as $item)
                <div>
                    <div class="bg-gray-100 w-full rounded-md flex justify-center items-center overflow-hidden h-[350px]">
                        <img src="{{ asset('storage/comingsoon/'.$item->coming_image) }}" alt="Coming Soon Image" class="object-contain max-h-full max-w-full">
                    </div>
                </div>
            @endforeach
        </div>
         <div class="h-px mt-8 w-full bg-slate-200"></div>
    </div>
</div>
