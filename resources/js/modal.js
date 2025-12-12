window.addEventListener('close-cart-modal', function(e) {
    setTimeout(() => {
        Livewire.dispatch('hideCartSuccess');
    }, e.detail.timeout || 2000);
});