@extends("layout")

@section("main")
<div class="min-h-screen flex justify-center items-start py-10">

    <!-- Центрированный белый блок -->
    <div class="w-full max-w-xl bg-white shadow-lg rounded-2xl p-8">

        <!-- Заголовок в центре -->
        <h1 class="text-3xl font-semibold text-center text-black mb-6">
            {{ __('text.my-account') }}
        </h1>

        <!-- Две кнопки по центру, в ряд -->
        <div class="flex justify-center gap-4 mb-8">
            <a href="{{ route('cart') }}"
               class="inline-flex items-center justify-center rounded-md border border-red-900 bg-white px-4 py-2 text-sm font-medium hover:bg-red-900 hover:text-white transition">
                <x-eva-shopping-cart class="h-5 w-5 mr-2" />
                {{ __('text.my-cart') }}
            </a>

            <a href="{{ route('heart') }}"
               class="inline-flex items-center justify-center rounded-md border border-red-900 bg-white px-4 py-2 text-sm font-medium hover:bg-red-900 hover:text-white transition">
                <x-eva-heart class="h-5 w-5 mr-2" />
                {{ __('text.favorites') }}
            </a>
        </div>

        <!-- Информация о пользователе (по центру, колонкой) -->
        <div class="flex flex-col items-center gap-2 mb-6 text-lg text-black">
            <div>
                <span class="font-medium">{{ __('text.name') }}:</span>
                <span>{{ auth()->user()->name }}</span>
            </div>

            <div>
                <span class="font-medium">{{ __('text.email') }}:</span>
                <span>{{ auth()->user()->email }}</span>
            </div>
        </div>

        <!-- Кнопка Logout -->
        <div class="flex justify-center">
            <form id="logout-form" action="{{ route('home') }}" method="POST" class="inline">
                @csrf
                <button 
                    type="submit"
                    class="rounded-md bg-red-900 px-6 py-2 text-sm font-medium text-white shadow hover:bg-white hover:text-red-900 hover:border-red-900 border border-transparent transition"
                >
                    {{ __('text.logout') }}
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
