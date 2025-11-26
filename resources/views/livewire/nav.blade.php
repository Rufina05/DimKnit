<section class="py-12 ">
  <div class="max-w-7xl mx-auto px-4 lg:px-8">

    <div class="flex items-center gap-4 ">
      <div class="w-4 h-8 bg-red-500 rounded-md"></div>
      <p class="text-red-500 uppercase tracking-wider font-semibold">Categories</p>
    </div>

    <h2 class="text-3xl md:text-4xl font-semibold mb-8">Browse By Category</h2>

    <div class="grid grid-cols-1 sm:grid-cols-3 md:grid-cols-5 gap-6 lg:gap-8">
      @foreach($categories as $category)
        <a href="{{ route('catalog', ['category' => $category->id]) }}" wire:navigate class="group flex flex-col justify-center items-center gap-4 py-6 lg:py-8 border border-gray-300 rounded-md text-center h-full cursor-pointer shadow-sm transform transition-all duration-300 ease-in-out hover:scale-105 hover:bg-red-400 hover:text-black">
          
          <div class="text-4xl md:text-5xl text-gray-600 group-hover:text-white">
            <img src="{{ asset('storage/categories/' . $category->category_icon) }}" alt="{{ $category->name_en }}" class="h-12 w-12 md:h-16 md:w-16" />
          </div>

          <p class="text-base md:text-lg font-medium group-hover:text-white">{{ $category->name_en }}</p>
        </a>
      @endforeach
    </div>

    <div class="h-[1px] mt-8 w-full bg-slate-200"></div>
  </div>
</section>
