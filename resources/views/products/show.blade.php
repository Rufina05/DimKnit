@extends('layout')

@section('main')
<div class="max-w-7xl mx-auto px-4 lg:px-8 my-8">
    <div class="text-sm lg:text-base text-gray-400 mb-6 mt-6">
        <span> {{ __('text.home') }} / {{ __('text.products') }} / </span>
        <span class="text-black">{{ $product->name }}</span>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        <div class="bg-gray-100 p-4 flex justify-center items-center rounded-lg">
            <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" class="w-full h-auto object-contain max-h-[500px] rounded-lg">
        </div>

        <div class="space-y-4 lg:pl-8">
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
            <p class="text-2xl font-bold text-red-500">€{{ number_format($product->price, 2) }}</p>
            <p class="text-gray-600">{{ $product->description }}</p>

            <div class="space-y-2">
                <h2 class="text-lg font-bold">{{ __('text.product-features') }}:</h2>
                <ul class="space-y-1">
                    <li>
                        <span class="font-medium">{{ __('text.category') }}:</span>
                        <span class="text-gray-700">{{ $product->category->name }}</span>
                    </li>

                    <li>
                        <span class="font-medium">{{ __('text.size') }}:</span>
                        <span class="text-gray-700">{{ $product->size->name }}</span>
                    </li>
                    <li>
                        <span class="font-medium">{{ __('text.frame') }}:</span>
                        @if($product->has_frame)
                            <x-healthicons-o-yes class="inline w-5 h-5 text-green-600"/>
                        @else
                            <x-healthicons-o-no class="inline w-5 h-5 text-red-600"/>
                        @endif
                    </li>
                    <li>
                        <span class="font-medium">{{ __('text.removable-clothes') }}:</span>
                        @if($product->removable_clothes)
                            <x-healthicons-o-yes class="inline w-5 h-5 text-green-600"/>
                        @else
                            <x-healthicons-o-no class="inline w-5 h-5 text-red-600"/>
                        @endif
                    </li>
                    <li>
                        <span class="font-medium">{{ __('text.has-parts') }}:</span>
                        @if($product->has_parts)
                            <x-healthicons-o-yes class="inline w-5 h-5 text-green-600"/>
                        @else
                            <x-healthicons-o-no class="inline w-5 h-5 text-red-600"/>
                        @endif
                    </li>
                </ul>
            </div>

            @livewire('add-to-cart', ['productId' => $product->id, 'showQuantitySelector' => true], key('cart-product-'.$product->id))
            
            <div class="mt-4">
                @livewire('add-to-heart', ['productId' => $product->id], key('heart-'.$product->id))
            </div>
        </div>
    </div>
</div>

@livewire('coming-soon-images')
@livewire('div-guarantee')
@endsection
