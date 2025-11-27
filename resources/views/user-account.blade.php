@extends("layout")

@section("main")
<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 py-6">

    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
        <span>Home / Account </span>
    </div>
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

    <div>
        <span>Name:</span>
        <span>{{ auth()->user()->name }}</span>
    </div>
    <div>
        <span>Email:</span>
        <span>{{ auth()->user()->email }}</span>
    </div>
    <div>
        <button onclick="event.preventDefault(); document.getElementById('logout-form').submit();"class="w-full inline-flex justify-center rounded-md bg-red-600 px-4 py-2 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">Logout</button>
        
        <form id="logout-form" action="{{ route('home') }}" method="POST" class="hidden">@csrf</form>
    </div>
@endsection
