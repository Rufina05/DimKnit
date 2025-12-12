<div class="space-y-6">

    <form wire:submit.prevent="save" class="space-y-6">

        <!-- Загрузка картинки -->
        <label class="block">
            <span class="text-gray-700">{{ __('text.image') }}</span>
            <input type="file"
                   wire:model="coming_image"
                   class="mt-2 block w-full border rounded p-2 focus:ring-red-500">
        </label>

        <!-- Превью -->
        @if ($coming_image)
            <div class="mt-4">
                <p class="text-gray-600 text-sm">{{ __('text.selected-file') }}:</p>
                <p class="font-medium">{{ $coming_image->getClientOriginalName() }}</p>
            </div>
        @endif

        @error('coming_image')
            <p class="text-red-600 text-sm font-semibold">{{ $message }}</p>
        @enderror

        <!-- Кнопка -->
        <button class="bg-red-900 text-white px-6 py-2 rounded hover:bg-white hover:text-red-900 hover:border-red-900 transition">
            {{__('text.add-image')}}
        </button>

        @if ($successMessage)
            <p class="text-green-600 font-semibold mt-2">{{ $successMessage }}</p>
        @endif

    </form>

</div>
