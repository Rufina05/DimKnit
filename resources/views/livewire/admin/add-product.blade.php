<div class="space-y-8">

    <form wire:submit.prevent="save" class="space-y-8">

        <!-- Заголовок -->
        <p class="text-xl font-semibold">{{ __('text.add-new-product') }}</p>

        <!-- Names -->
        <div>
            <p class="text-gray-700 font-medium mb-2">{{ __('text.names') }}</p>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <input wire:model="name_en" placeholder="{{ __('text.name-en') }}" class="border p-3 rounded w-full">
                    @error('name_en') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input wire:model="name_ro" placeholder="{{ __('text.name-ro') }}" class="border p-3 rounded w-full">
                    @error('name_ro') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input wire:model="name_ru" placeholder="{{ __('text.name-ru') }}" class="border p-3 rounded w-full">
                    @error('name_ru') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <input wire:model="name_ee" placeholder="{{ __('text.name-ee') }}" class="border p-3 rounded w-full">
                    @error('name_ee') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Slugs (скрытые поля или видимые, по необходимости) -->
        <input type="hidden" wire:model="slug_en">
        <input type="hidden" wire:model="slug_ro">
        <input type="hidden" wire:model="slug_ru">
        <input type="hidden" wire:model="slug_ee">

        <!-- Descriptions -->
        <div>
            <p class="text-gray-700 font-medium mb-2">{{ __('text.descriptions') }}</p>
            <div class="grid grid-cols-2 gap-4">
                <div>
                    <textarea wire:model="description_en" placeholder="{{ __('text.description-en') }}" class="border p-3 rounded h-32 w-full"></textarea>
                    @error('description_en') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <textarea wire:model="description_ro" placeholder="{{ __('text.description-ro') }}" class="border p-3 rounded h-32 w-full"></textarea>
                    @error('description_ro') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <textarea wire:model="description_ru" placeholder="{{ __('text.description-ru') }}" class="border p-3 rounded h-32 w-full"></textarea>
                    @error('description_ru') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
                <div>
                    <textarea wire:model="description_ee" placeholder="{{ __('text.description-ee') }}" class="border p-3 rounded h-32 w-full"></textarea>
                    @error('description_ee') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>
        </div>

        <!-- Price -->
        <div>
            <p class="text-gray-700 font-medium mb-2">{{ __('text.price') }}</p>
            <input type="number" wire:model="price" placeholder="{{ __('text.price') }}" class="border p-3 rounded w-full">
            @error('price') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Category & Size -->
        <div class="grid grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700 font-medium mb-2">{{ __('text.category') }}</p>
                <select wire:model="category_id" class="border p-3 rounded w-full">
                    <option value="">{{ __('text.select') }}</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
                @error('category_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <p class="text-gray-700 font-medium mb-2">{{ __('text.size') }}</p>
                <select wire:model="size_id" class="border p-3 rounded w-full">
                    <option value="">{{ __('text.select') }}</option>
                    @foreach($sizes as $size)
                        <option value="{{ $size->id }}">{{ $size->name }}</option>
                    @endforeach
                </select>
                @error('size_id') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Toggles -->
        <div class="flex gap-6">
            <label class="flex items-center gap-2">
                <input type="checkbox" wire:model="has_frame">
                <span>{{ __('text.has-frame') }}</span>
            </label>

            <label class="flex items-center gap-2">
                <input type="checkbox" wire:model="is_available">
                <span>{{ __('text.available') }}</span>
            </label>

            <label class="flex items-center gap-2">
                <input type="checkbox" wire:model="has_parts">
                <span>{{ __('text.has-parts') }}</span>
            </label>
        </div>

        <!-- Image -->
        <div>
            <p class="text-gray-700 font-medium mb-2">{{ __('text.image') }}</p>
            <input type="file" wire:model="main_image">
            @error('main_image') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <!-- Button -->
        <button class="bg-red-900 text-white px-8 py-3 rounded-md shadow hover:bg-white hover:text-red-900 hover:border-red-900 transition">
            {{ __('text.add-product') }}
        </button>

        @if (session('success'))
            <p class="text-green-600 font-semibold">{{ session('success') }}</p>
        @endif

    </form>

</div>
