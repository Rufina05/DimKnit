<header class="sticky top-0 z-50 bg-white border-b border-gray-200" x-data="{ expanded: false }">

    <div class="bg-black px-4 block">
        <div class="max-w-7xl mx-auto">
            <div class="flex justify-between items-center text-white py-3">
                <div></div>
                <div class="flex items-center gap-3">
                    <p class="text-sm text-gray-200">
                        {{ __('text.find-gift') }}
                    </p>
                    <a href="{{ route('catalog') }}" wire:navigate 
                       class="text-sm font-semibold hover:text-red-400">
                       {{ __('text.shop-now') }}
                    </a>
                </div>
                <div class="flex items-center gap-2">
                    @livewire('language.language-selector')
                </div>

            </div>
        </div>
    </div>

    <div class="py-4 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="flex items-center justify-between">
                <div class="shrink-0">
                    <a href="{{ route('home') }}" wire:navigate>
                        <h1 class="text-3xl font-bold text-red-900 hover:text-red-800 transition">
                            DimKnit
                        </h1>
                    </a>
                </div>

                <nav class="hidden lg:flex items-center space-x-6 mx-auto">
                    <a href="{{ route('catalog') }}" wire:navigate class="px-4 py-2.5 text-base font-medium text-gray-800 rounded-full hover:text-red-900 transition">
                       {{ __('text.catalog') }}
                    </a>
                    <a href="{{ route('contacts') }}" wire:navigate class="px-4 py-2.5 text-base font-medium text-gray-800 rounded-full hover:text-red-900 transition">
                       {{ __('text.contacts') }}
                    </a>
                </nav>

                <div class="hidden lg:flex items-center gap-6">
                    <!-- Поиск -->
                    <div class="relative">
                        <div class="flex items-center gap-2 p-2.5 rounded-md bg-gray-100">
                            <input id="search" type="text" placeholder="{{ __('text.search') }}" class="text-black/60 text-sm px-3 py-1.5 bg-gray-100 focus:outline-none w-64">
                            <button id="search-btn" class="text-gray-600 hover:text-red-800 transition">
                                <x-eva-search class="w-6 h-6" />
                            </button>
                        </div>
                        <div id="search-results" class="hidden absolute top-full mt-2 left-0 right-0 bg-white border border-gray-200 rounded-lg shadow-lg max-h-[400px] overflow-y-auto z-50 p-2">
                        </div>
                    </div>

                    <!-- Пользовательские кнопки -->
                    <div class="flex items-center gap-4">
                        @auth
                            @if(auth()->user()->is_admin)
                                <!-- Только кнопка Админ -->
                                <a href="{{ route('admin.index') }}" wire:navigate class="text-gray-800 font-medium hover:text-red-800 transition">
                                    <x-eva-person class="w-6 h-6 text-gray-800" /> {{ __('text.dashboard') }}
                                </a>
                            @else
                                <!-- Обычный пользователь -->
                                <a href="{{ route('heart') }}" wire:navigate class="hover:text-red-800 transition">
                                    <x-eva-heart class="w-6 h-6 text-gray-800 hover:text-red-800" />
                                </a>

                                <a href="{{ route('cart') }}" wire:navigate class="hover:text-red-800 transition">
                                    <x-eva-shopping-cart class="w-6 h-6 text-gray-800 hover:text-red-800" />
                                </a>

                                <a href="{{ route('account') }}" wire:navigate class="hover:text-red-800 transition">
                                    <x-eva-person class="w-6 h-6 text-gray-800 hover:text-red-800" />
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" wire:navigate class="text-gray-800 font-medium hover:text-red-800 transition">
                                {{ __('text.login') }}
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Кнопка для мобильного меню -->
                <div class="flex lg:hidden">
                    <button @click="expanded = !expanded" class="p-2.5 text-gray-900 rounded-full border border-gray-900 hover:bg-gray-900 hover:text-white transition"> 
                        <span x-show="!expanded">
                            <x-eva-menu-outline class="w-7 h-7" />
                        </span>
                        <span x-show="expanded">
                            <x-eva-close class="w-7 h-7" />
                        </span>
                    </button>
                </div>
            </div>

            <!-- Мобильное меню -->
            <nav x-show="expanded" x-transition class="mt-4 pt-6 pb-6 bg-white border border-gray-200 rounded-md shadow-md lg:hidden">
                <div class="flex flex-col px-6 space-y-4">
                    <a href="{{ route('catalog') }}" wire:navigate class="text-base font-medium text-gray-900 hover:text-red-900">
                       {{ __('text.catalog') }}
                    </a>
                    <a href="{{ route('contacts') }}" wire:navigate class="text-base font-medium text-gray-900 hover:text-red-900">
                       {{ __('text.contacts') }}
                    </a>

                    <!-- Мобильный поиск -->
                    <div class="relative">
                        <div class="flex items-center gap-2 p-3 bg-gray-100 rounded-xl">
                            <input id="search-mobile" type="text" placeholder="{{ __('text.search') }}" class="w-full text-sm text-black/60 px-3 py-2 rounded-md bg-gray-100 focus:outline-none">
                            <button class="p-2 text-gray-600 hover:text-red-800">
                                <x-eva-search class="w-6 h-6" />
                            </button>
                        </div>
                        <div id="search-results-mobile" class="hidden absolute top-full mt-2 left-0 right-0 bg-white border border-gray-200 rounded-lg shadow-lg max-h-[300px] overflow-y-auto z-50 p-2">
                        </div>
                    </div>

                    @auth
                        @if(auth()->user()->is_admin)
                            <a href="{{ route('admin.index') }}" class="text-base font-medium text-gray-900 hover:text-red-900">
                                Admin {{ __('text.dashboard') }}
                            </a>
                        @else
                            <a href="{{ route('heart') }}" class="flex items-center gap-2 hover:text-red-500">
                                <x-eva-heart class="w-6 h-6 text-gray-800" /> {{ __('text.favorites') }}
                            </a>
                            <a href="{{ route('cart') }}" class="flex items-center gap-2 hover:text-red-500">
                                <x-eva-shopping-cart class="w-6 h-6 text-gray-800" /> {{ __('text.cart') }}
                            </a>
                            <a href="{{ route('account') }}" class="flex items-center gap-2 hover:text-red-900">
                                <x-eva-person class="w-6 h-6 text-gray-800" /> {{ __('text.account') }}
                            </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="text-base font-medium text-gray-900 hover:text-red-900">
                            {{ __('text.login') }}
                        </a>
                    @endauth
                </div>
            </nav>
        </div>
    </div>
</header>
