<div>
    @if($showQuantitySelector)
        <!-- Страница товара: счётчик + кнопка -->
        <div x-data="{ quantity: 1 }" class="flex items-center gap-4">

            <!-- Счётчик -->
            <div class="flex items-center border rounded-md overflow-hidden">
                <button type="button"
                        @click="quantity = Math.max(1, quantity - 1)"
                        class="px-3 py-2 hover:bg-gray-100">-</button>

                <input type="text"
                       class="w-12 text-center border-x select-none"
                       x-model="quantity"
                       readonly>

                <button type="button"
                        @click="quantity = quantity + 1"
                        class="px-3 py-2 hover:bg-gray-100">+</button>
            </div>

            <!-- Кнопка Add to Cart -->
            <button type="button"
                    @click="$wire.addToCart(quantity)"
                    wire:loading.attr="disabled"
                    class="flex items-center justify-center gap-2 bg-black text-white px-6 py-2 rounded-md hover:bg-white hover:text-black transition-colors">

                <!-- Показываем иконку и текст только когда не в состоянии загрузки -->
                <span wire:loading.remove class="flex items-center gap-2">
                    <x-eva-shopping-cart class="w-4 h-4" />
                    Add to Cart
                </span>

                <!-- Показываем только надпись Loading при загрузке -->
                <span wire:loading>Loading...</span>
            </button>

        </div>
    @else
        <!-- Страница каталога: только кнопка -->
        <button type="button"
                wire:click="addToCart"
                wire:loading.attr="disabled"
                class="flex items-center justify-center gap-2 bg-black text-white px-6 py-2 rounded-md hover:bg-white hover:text-black transition-colors">

            <span wire:loading.remove class="flex items-center gap-2">
                <x-eva-shopping-cart class="w-4 h-4" />
                Add to Cart
            </span>

            <span wire:loading>Loading...</span>
        </button>
    @endif
</div>
