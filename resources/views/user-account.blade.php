@extends("layout")

@section("main")
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">

    <!-- Навигация -->
    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
        <span>Home / Account </span>
    </div>

    <!-- Заголовок и кнопки -->
    <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
        <h1 class="text-2xl font-semibold text-black">My Account</h1>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('cart') }}"
               class="inline-flex items-center justify-center rounded-md border border-red-900 bg-white px-4 py-2 text-sm font-medium hover:bg-red-900 hover:text-white">
                <x-eva-shopping-cart class="h-5 w-5 mr-2" />
                My Cart
            </a>

            <a href="{{ route('heart') }}"
               class="inline-flex items-center justify-center rounded-md border border-red-900 bg-white px-4 py-2 text-sm font-medium hover:bg-red-900 hover:text-white">
                <x-eva-heart class="h-5 w-5 mr-2" />
                Favorites
            </a>
        </div>
    </div>

    <!-- Секции аккаунта -->
    <div class="mt-8 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

        <!-- Информация об аккаунте -->
        <section class="col-span-1 md:col-span-2 lg:col-span-1 rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Account Information</h2>
            <div class="space-y-3 text-sm">
                <div class="flex items-center gap-2">
                    <span class="font-medium text-gray-600">Name:</span>
                    <span class="text-gray-900">{{ auth()->user()->name }}</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="font-medium text-gray-600">Email:</span>
                    <span class="text-gray-900">{{ auth()->user()->email }}</span>
                </div>
            </div>
        </section>

        <!-- Действия аккаунта -->
        <section class="col-span-1 rounded-lg border border-gray-200 bg-white p-5 shadow-sm">
            <h2 class="text-lg font-medium text-gray-900 mb-4">Account Actions</h2>
            <button
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="w-full inline-flex justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                Logout
            </button>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </section>  

    </div>
</div>
@endsection
