@extends("layout")

@section("main")
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
            <span>Home / Catalog  </span>
    </div>

    <div class="grid grid-cols-[300px_1fr] gap-8">

        <!-- Filters Left Column -->
        <div class="lg:block">
            @livewire('filters', [
                'categories' => $categories,
                'sizes' => $sizes,
                'selectedCategory' => $selectedCategory
            ])
        </div>

        <!-- Products Right Column -->
        <main>
            @livewire('products-catalog', ['products' => $products])
        </main>

    </div>
</div>
@endsection
