<button type="button" wire:click.stop="addToHeart"  wire:loading.attr="disabled" class="flex items-center justify-center w-8 h-8 rounded-full text-red-900 bg-white hover:bg-red-900 hover:text-white transition">
    <span> <x-eva-heart class="w-4 h-4"/> </span>
    <span wire:loading>...</span>
</button>
