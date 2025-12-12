<div class="bg-white p-6 rounded-lg shadow-md lg:sticky lg:top-8">

    <!-- Category -->
    <div class="mb-6">
        <p class="font-semibold mb-2">{{ __('text.category') }}</p>
        <ul class="flex flex-col gap-2">
            @foreach($categories as $cat)
                <li class="flex items-center gap-2">
                    <input type="checkbox" wire:model.live="categoryIds" value="{{ $cat->id }}" class="h-4 w-4 text-red-500">
                    <span>{{ $cat->name}}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Size -->
    <div class="mb-6">
        <p class="font-semibold mb-2">Size</p>
        <ul class="flex flex-col gap-2">
            @foreach($sizes as $size)
                <li class="flex items-center gap-2">
                    <input type="checkbox" wire:model.live="sizeIds" value="{{ $size->id }}" class="h-4 w-4 text-red-500">
                    <span>{{ $size->name ?? $size->name }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <!-- Others -->
    <div class="mb-6">
        <p class="font-semibold mb-2">{{ __('text.options') }}</p>
        <ul class="flex flex-col gap-2">
            @foreach([
                'availability' => __('text.in-stock'),
                'has_frame' => __('text.has-frame'),
                'removable_clothes' => __('text.removable-clothes'),
                'has_parts' => __('text.has-parts'),
            ] as $key => $label)
                <li class="flex items-center gap-2">
                    <input type="checkbox" wire:model.live="{{ $key }}" class="h-4 w-4 text-red-500">
                    <span>{{ $label }}</span>
                </li>
            @endforeach
        </ul>
    </div>

    <button wire:click="resetFilters" 
            class="w-full border border-red-900 text-red-900 py-2 rounded-md hover:bg-red-900 hover:text-white transition duration-200">
        {{ __('text.reset-all-filters') }}
    </button>

</div>