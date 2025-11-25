<button
    wire:click="removeFromCart"
    wire:loading.attr="disabled"
    class="inline-flex items-center gap-1 px-2 py-2 rounded-md text-red-900 hover:text-white hover:bg-red-900 transition text-sm font-medium border border-red-200 hover:border-red-600"
>
    <span wire:loading.remove class="w-5 h-5 flex items-center justify-center"><x-monoicon-delete class="w-5 h-5"/></span>
    <span wire:loading.remove>Delete</span>
    <span wire:loading class="animate-pulse">...</span>
</button>
