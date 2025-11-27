<button wire:click="removeFromHeart" wire:loading.attr="disabled"
    class="h-8 w-8 rounded-full bg-white text-red-900 hover:bg-red-900 hover:text-white flex justify-center items-center">

    <span wire:loading.remove>
        <x-monoicon-delete class="w-4 h-4"/>
    </span>

    <span wire:loading class="text-sm">...</span>
</button>
