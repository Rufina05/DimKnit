<div class="relative inline-block text-left">
    <select
        wire:change="setLanguage($event.target.value)"
        class="bg-black text-white text-sm px-3 py-1 rounded cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-500"
    >
        @foreach($locales as $code => $language)
            <option value="{{ $code }}" @selected($currentLocale === $code)>
                {{ $language }}
            </option>
        @endforeach
    </select>
</div>

@script
<script>
    $wire.on('language-changed', () => {
        window.location.reload();
    });
</script>
@endscript