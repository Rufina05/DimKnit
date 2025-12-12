@extends("layout")

@section("main")

<div x-data="{ active: null }" class="py-16">
    <div class="max-w-7xl mx-auto px-4 lg:px-8 space-y-16">

        <!-- Заголовок страницы -->
        <div class="text-center">
            <p class="text-3xl md:text-4xl font-semibold mt-4 mb-6">{{ __('text.admin-panel') }}</p>
        </div>

        <!-- Блок: Добавить товар -->
        <section>
            <div class="flex items-center gap-4 mb-6 cursor-pointer"
                 @click="active = active === 'product' ? null : 'product'">

                <div class="w-4 h-8 bg-red-500 rounded-md"></div>
                <p class="text-red-500 uppercase tracking-wider font-semibold">
                    {{ __('text.add-new-product') }}
                </p>
            </div>

            <div x-show="active === 'product'" x-transition class="bg-white p-8 rounded-lg shadow-md">
                @livewire('admin.add-product')
            </div>
        </section>

        <!-- Блок: Добавить Coming Soon Image -->
        <section>
            <div class="flex items-center gap-4 mb-6 cursor-pointer"
                 @click="active = active === 'coming' ? null : 'coming'">

                <div class="w-4 h-8 bg-red-500 rounded-md"></div>
                <p class="text-red-500 uppercase tracking-wider font-semibold">
                   {{ __('text.add-coming-soon-image') }}   
                </p>
            </div>

            <div x-show="active === 'coming'" x-transition class="bg-white p-8 rounded-lg shadow-md">
                @livewire('admin.add-coming-soon')
            </div>
        </section>

    </div>
</div>

@endsection
