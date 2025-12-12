<div>
    @if($showQuantitySelector)
        <!-- Режим с селектором количества (страница продукта) -->
        <div x-data="{ quantity: @entangle('quantity') }" class="flex items-center gap-4">

            <!-- Селектор количества -->
            <div class="flex items-center border-2 border-red-900 rounded-md overflow-hidden">
                <button type="button"
                        @click="quantity = Math.max(1, quantity - 1)"
                        class="px-4 py-2 bg-red-900 text-white hover:bg-white hover:text-red-900 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path>
                    </svg>
                </button>

                <input type="text"
                       class="w-16 text-center font-semibold text-lg border-0 focus:outline-none focus:ring-0"
                       x-model="quantity"
                       readonly>

                <button type="button"
                        @click="quantity = quantity + 1"
                        class="px-4 py-2 bg-red-900 text-white hover:bg-white hover:text-red-900 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </button>
            </div>

            <!-- Кнопка добавления -->
            <button type="button"
                    @click="$wire.addToCart(quantity)"
                    wire:loading.attr="disabled"
                    class="flex-1 flex items-center justify-center gap-2 
                           bg-red-900 text-white px-8 py-3 rounded-md 
                           hover:bg-white hover:text-red-900 
                           border-2 border-red-900
                           transition-colors font-semibold
                           disabled:opacity-50 disabled:cursor-not-allowed">

                <span wire:loading.remove wire:target="addToCart" class="flex items-center gap-2">
                    <x-eva-shopping-cart class="w-5 h-5" />
                    {{ __('text.add-to-cart') }}
                </span>

                <span wire:loading wire:target="addToCart" class="flex items-center gap-2">
                    <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('text.adding') }}...
                </span>
            </button>

        </div>
    @else
        <!-- Режим без селектора (каталог) - быстрое добавление -->
        <button type="button"
                wire:click="addToCart(1)"
                wire:loading.attr="disabled"
                class="w-full flex items-center justify-center gap-2 
                       text-white font-semibold px-4 py-2
                       transition-all
                       disabled:opacity-50 disabled:cursor-not-allowed">

            <span wire:loading.remove wire:target="addToCart" class="flex items-center gap-2">
                <x-eva-shopping-cart class="w-5 h-5" />
                {{ __('text.add-to-cart') }}
            </span>

            <span wire:loading wire:target="addToCart" class="flex items-center gap-2">
                <svg class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </span>
        </button>
    @endif
</div>