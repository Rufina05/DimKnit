<div x-data="{ show: false }" 
     @open-modal.window="show = true"
     @close-modal.window="show = false">

    <div x-show="show" 
         x-transition.opacity
         @click.self="$wire.closeModal()"
         class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50"
         style="display: none;">
        
        <div @click.stop 
             class="bg-white rounded-lg shadow-lg w-11/12 md:w-3/4 lg:w-2/3 p-8 relative max-h-[90vh] overflow-y-auto">
            
            <!-- Кнопка закрытия -->
            <button 
                type="button"
                @click="$wire.closeModal()"
                class="absolute top-4 right-4 text-gray-500 hover:text-gray-700 text-2xl font-bold"
            >
                ×
            </button>

            <h2 class="text-2xl font-semibold text-red-900 mb-6 border-b pb-2">
                {{ __('text.edit-product') }}
            </h2>

            <!-- Сообщение об успехе -->
            @if (session()->has('success'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="save" class="space-y-6">

                <!-- Названия на разных языках -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(['en','ro','ru','ee'] as $lang)
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                {{ __('text.name') }} {{ strtoupper($lang) }}
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   wire:model="name_{{ $lang }}" 
                                   class="w-full border border-red-500 p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none
                                          @error('name_'.$lang)  @enderror">
                            @error('name_'.$lang)
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <!-- Описание на разных языках -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach(['en','ro','ru','ee'] as $lang)
                        <div>
                            <label class="block mb-2 font-medium text-gray-700">
                                {{ __('text.description-'.$lang) }}
                            </label>
                            <textarea 
                                wire:model="description_{{ $lang }}" 
                                rows="4"
                                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none"
                            ></textarea>
                        </div>
                    @endforeach
                </div>

                <!-- Цена и категория -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('text.price') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <input type="number" 
                               wire:model="price" 
                               step="0.5"
                               class="w-full border p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none
                                      @error('price') border-red-500 @enderror">
                        @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('text.category') }}
                            <span class="text-red-500">*</span>
                        </label>
                        <select wire:model="category_id" 
                                class="w-full border p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none
                                       @error('category_id') border-red-500 @enderror">
                            <option value="">{{ __('text.select-category') }}</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Размер (если нужно) -->
                @if($sizes && $sizes->count() > 0)
                    <div>
                        <label class="block mb-2 font-medium text-gray-700">
                            {{ __('text.size') }}
                        </label>
                        <select wire:model="size_id" 
                                class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none">
                            <option value="">{{ __('text.select-size') }}</option>
                            @foreach($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->name }}</option>
                            @endforeach
                        </select>
                    </div>
                @endif

                <!-- Изображение -->
                <div>
                    <label class="block mb-2 font-medium text-gray-700">
                        {{ __('text.image') }}
                    </label>
                    <input type="file" 
                           wire:model="main_image" 
                           accept="image/*"
                           class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-red-900 focus:outline-none">
                    @error('main_image')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="mt-3 flex gap-4">
                        <!-- Текущее изображение -->
                        @if($currentImage && !$main_image)
                            <div>
                                <p class="text-sm text-gray-600 mb-2">{{ __('text.image') }}</p>
                                <img src="{{ asset('storage/'.$currentImage) }}"
                                     class="w-32 h-32 object-contain border rounded">
                            </div>
                        @endif

                        <!-- Превью нового изображения -->
                        @if($main_image)
                            <div>
                                <p class="text-sm text-gray-600 mb-2">{{ __('text.image') }}</p>
                                <img src="{{ $main_image->temporaryUrl() }}"
                                     class="w-32 h-32 object-contain border rounded">
                            </div>
                        @endif
                    </div>

                    <!-- Индикатор загрузки -->
                    <div wire:loading wire:target="main_image" class="mt-2">
                        <span class="text-sm text-gray-600">...</span>
                    </div>
                </div>

                <!-- Кнопки -->
                <div class="flex justify-end gap-3 mt-6 pt-4 border-t">
                    <button type="button" 
                            @click="$wire.closeModal()"
                            class="px-6 py-2 border border-gray-300 rounded-md bg-gray-100 hover:bg-gray-200 transition">
                        {{ __('text.cancel') }}
                    </button>
                    <button type="submit"
                            wire:loading.attr="disabled"
                            wire:target="save"
                            class="px-6 py-2 bg-red-900 text-white rounded-md hover:bg-red-800 transition
                                   disabled:opacity-50 disabled:cursor-not-allowed
                                   flex items-center gap-2">
                        <span wire:loading.remove wire:target="save">
                            {{ __('text.save') }}
                        </span>
                        <span wire:loading wire:target="save" class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            {{ __('text.save') }}...
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>