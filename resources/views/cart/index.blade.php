@extends('layout')

@section('main')

<div class="max-w-7xl mx-auto px-4 lg:px-8 my-8">

    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6 ml-2 lg:ml-4">
        <span>Home / Cart </span>
    </div>

    <h1 class="ml-2 lg:ml-4 text-black text-3xl pt-5 mb-6">Shopping Cart</h1>

    <div x-data="{
        cart: [
            @foreach($cart->cartItems as $item)
                { price: {{ $item->product->price }}, qty: {{ $item->quantity }} },
            @endforeach
            ]}" class="grid grid-cols-1 lg:grid-cols-12 gap-8">

        <div class="lg:col-span-8 space-y-4">

            <div class="hidden md:grid grid-cols-12 gap-4 p-4 md:p-6 
                        shadow-[0_0_10px_#e5e5e5] rounded-lg bg-white font-medium text-sm md:text-base">
                <div class="col-span-6">Product</div>
                <div class="col-span-2 text-center">Price</div>
                <div class="col-span-2 text-center">Quantity</div>
                <div class="col-span-2 text-center">Subtotal</div>
            </div>

            @foreach($cart->cartItems as $index => $item)
            <div class="grid grid-cols-12 gap-4 p-4 md:p-6 bg-white 
                        shadow-[0_0_10px_#e5e5e5] rounded-lg items-center">

                <div class="col-span-12 md:col-span-6 flex flex-col md:flex-row items-center md:items-center gap-3">
                    <img src="{{ asset('storage/products/' . $item->product->main_image) }}"
                         alt="{{ $item->product->name_en }}"
                         class="w-20 h-20 object-contain rounded-md">

                    <p class="font-semibold text-gray-800 text-base md:text-lg leading-tight text-center md:text-left">
                        {{ $item->product->name_en }}
                    </p>
                </div>

                <div class="col-span-6 md:col-span-2 flex justify-between md:justify-center items-center mt-2 md:mt-0">
                    <span class="md:hidden font-medium">Price:</span>
                    €{{ number_format($item->product->price, 2) }}
                </div>

                <div class="col-span-6 md:col-span-2 flex justify-between md:justify-center items-center mt-2 md:mt-0">
                    <span class="md:hidden font-small"></span>
                    <div class="flex border rounded-md overflow-hidden text-sm md:text-base">
                        <button class="px-3 py-2 hover:bg-gray-100"
                            x-on:click="if(cart[{{ $index }}].qty > 1) cart[{{ $index }}].qty--">-</button>

                        <span class="px-4 py-2 border-x w-12 text-center">
                            <span x-text="cart[{{ $index }}].qty"></span>
                        </span>

                        <button class="px-3 py-2 hover:bg-gray-100"
                            x-on:click="cart[{{ $index }}].qty++">+</button>
                    </div>
                </div>

                <div class="col-span-12 md:col-span-2 flex justify-between md:justify-center items-center mt-2 md:mt-0">
                    <span class="md:hidden font-medium">Subtotal:</span>
                    €<span x-text="(cart[{{ $index }}].price * cart[{{ $index }}].qty).toFixed(2)"></span>
                </div>

                <div class="col-span-12 flex justify-end pt-2">
                    @livewire('remove-from-cart', ['productId' => $item->product->id], key('remove-'.$item->id))
                </div>

            </div>
            @endforeach

            <!--Buttons -->
            <div class="flex flex-wrap gap-4 justify-between mt-4">
                <a href="{{ route('catalog') }}" wire:navigate class="px-6 py-2 border rounded-md hover:bg-gray-100">
                    Return To Shop
                </a>
                <a href="{{ route('cart') }}"  wire:navigate class="px-6 py-2 border rounded-md hover:bg-gray-100">
                    Update Cart
                </a>
            </div>

        </div>

        <!--Cart TOTAL -->
        <div class="lg:col-span-4">

            <div class="space-y-4 p-6 bg-white rounded-lg shadow-[0_0_10px_#e5e5e5]">

                <h2 class="text-2xl font-bold">Cart Total</h2>

                <div class="space-y-3 text-sm md:text-base">

                    <div class="flex justify-between">
                        <span>Subtotal:</span>
                        <span>€<span x-text="cart.reduce((sum, i) => sum + i.price * i.qty, 0).toFixed(2)"></span></span>
                    </div>

                    <div class="h-[1px] mt-2 w-full bg-slate-200"></div>

                    <div class="flex justify-between">
                        <span>Shipping:</span>
                        <span>Free</span>
                    </div>

                    <div class="h-[1px] mt-2 w-full bg-slate-200"></div>

                    <div class="flex justify-between font-bold text-base md:text-lg">
                        <span>Total:</span>
                        <span>€<span x-text="cart.reduce((sum, i) => sum + i.price * i.qty, 0).toFixed(2)"></span></span>
                    </div>

                </div>

                <button class="w-full bg-red-900 text-white py-3 rounded-md hover:bg-white hover:text-red-900 transition">
                    Proceed to Checkout
                </button>

            </div>

        </div>

    </div>
</div>

@endsection
