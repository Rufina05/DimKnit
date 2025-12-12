<div
    x-data="{ 
        show: false,
        message: ''
    }"
    x-show="show"
    x-transition.opacity.duration.300ms
    @cart-success.window="
        message = $event.detail.message;
        show = true;
        setTimeout(() => { show = false }, 3500);
    "
    @click.away="show = false"
    class="fixed bottom-6 right-6 z-[9999] 
           bg-white border-2 border-red-900 
           px-6 py-4 rounded-lg shadow-2xl 
           w-80 relative"
    style="display: none;"
>
    <!-- Кнопка закрытия -->
    <button
        @click="show = false"
        class="absolute top-2 right-2 
               text-red-900 hover:text-white
               hover:bg-red-900 
               rounded-full w-6 h-6 
               flex items-center justify-center
               transition font-bold text-lg"
        aria-label="{{ __('text.close') }}"
    >
        ×
    </button>

    <!-- Содержимое -->
    <div class="flex items-start gap-3">
        <!-- Иконка успеха -->
        <div class="flex-shrink-0 w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>

        <!-- Сообщение -->
        <div class="flex-1 pt-1">
            <p class="text-green-700 font-semibold text-sm" x-text="message"></p>
        </div>
    </div>

    <!-- Кнопки -->
    <div class="flex justify-end gap-2 mt-4 pt-3 border-t border-gray-200">
        <button
            @click="show = false"
            class="text-gray-600 text-sm font-medium px-3 py-1.5 rounded 
                   hover:bg-gray-100 transition"
        >
            {{ __('text.continue-shopping') }}
        </button>
        
            href="{{ route('cart') }}"
            wire:navigate
            class="bg-red-900 text-white text-sm font-semibold 
                   px-4 py-1.5 rounded hover:bg-red-800 transition 
                   inline-flex items-center gap-1"
        >
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
            </svg>
            {{ __('text.view-cart') }}
        </a>
    </div>
</div>