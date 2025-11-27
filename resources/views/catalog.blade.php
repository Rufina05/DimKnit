@extends("layout")

@section("main")
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

    <!-- Хлебные крошки -->
    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
        <span>Home / Catalog</span>
    </div>

    <!-- Контейнер фильтр + продукты -->
    <div class="flex flex-col lg:flex-row gap-8">

        <!-- Фильтры -->
        <aside class="w-full lg:w-[300px] lg:sticky lg:top-8">
            @livewire('filters', [
                'categories' => $categories,
                'sizes' => $sizes,
                'selectedCategory' => $selectedCategory
            ])
        </aside>

        <!-- Продукты -->
        <main class="flex-1 min-w-0">
            <div class="w-full">
                @livewire("products-catalog", [
                    "products" => $products,
                    "selectedCategory" => $selectedCategory ?? null
                ])
            </div>
        </main>

    </div>
</div>
@endsection
