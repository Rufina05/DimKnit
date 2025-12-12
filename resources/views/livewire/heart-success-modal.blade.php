<div
    x-data="{ 
        show: false,
        message: ''
    }"
    x-show="show"
    x-transition.opacity.duration.300ms
    @favorite-success.window="
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
        <!-- Иконка сердца -->
        <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
            <svg class="w-6 h-6 text-red-600" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
        </div>

        <!-- Сообщение -->
        <div class="flex-1 pt-1">
            <p class="text-red-900 font-semibold text-sm" x-text="message"></p>
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
        
            href="{{ route('heart') }}"
            wire:navigate
            class="bg-red-900 text-white text-sm font-semibold 
                   px-4 py-1.5 rounded hover:bg-red-800 transition 
                   inline-flex items-center gap-1"
        >
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
            </svg>
            {{ __('text.view-favorites') }}
        </a>
    </div>
</div>