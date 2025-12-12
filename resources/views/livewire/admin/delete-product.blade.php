<div>
    <button wire:click="deleteProduct"
            wire:loading.attr="disabled"
            class="inline-flex items-center gap-1 px-2 py-2 rounded-md text-white bg-red-900 
                   hover:text-red-900 hover:bg-white hover:border-red-900 transition text-sm font-medium 
                  ">

        <span wire:loading.remove class="w-5 h-5 flex items-center justify-center">
            <x-monoicon-delete class="w-5 h-5"/>
        </span>

        <span wire:loading class="animate-pulse">...</span>
    </button>
</div>
