<div class="flex items-center gap-4">
    <!-- Quantity Selector (только если showQuantitySelector = true) -->
    @if($showQuantitySelector)
        <div class="flex items-center border rounded-md overflow-hidden">
            <button wire:click="decrement" class="px-3 py-2 hover:bg-gray-100">-</button>
            <input type="text" class="w-12 text-center border-x" wire:model="quantity" readonly>
            <button wire:click="increment" class="px-3 py-2 hover:bg-gray-100">+</button>
        </div>
    @endif

    <!-- Add to Cart Button -->
    <button wire:click="addToCart"
            wire:loading.attr="disabled"
            class="bg-red-900 text-white px-6 py-2 rounded-md hover:bg-white hover:text-red-900 transition-colors">

        <span wire:loading.remove class="flex items-center gap-2">
            <x-eva-shopping-cart class="w-4 h-4" />
            Add to Cart
        </span>

        <span wire:loading>
            Loading...
        </span>
    </button>
</div>
