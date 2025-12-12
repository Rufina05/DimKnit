<footer class="bg-black text-white mt-5 pt-20">
  <div class="max-w-7xl mx-auto pt-5 px-4 lg:px-8">
  
    <div class="grid mt-5 grid-cols md:grid-cols-2 lg:grid-cols-4 gap-8">

      <div class="space-y-5">
        <h3 class="text-lg font-bold">{{ __('text.connect-with-us') }}</h3>
        <p class="text-gray-400">{{ __('text.follow-us-on-social-media') }}</p>
        <div class="flex flex-row items-center gap-4 text-white/70">
          <a href="#" class="hover:text-white text-2xl transition-colors duration-200">
            <x-bi-instagram /> 
          </a>
          <a href="#" class="hover:text-white text-2xl transition-colors duration-200">
            <x-bi-whatsapp /> 
          </a>
          <a href="#" class="hover:text-white text-2xl transition-colors duration-200">
            <x-bi-telegram /> 
          </a>
        </div>
      </div>

      <div class="space-y-5">
        <h3 class="text-lg font-bold">{{ __('text.quick-links') }}</h3>
        <ul class="space-y-3 text-gray-400">
          <li><a href="{{ route('home') }}" wire:navigate class="hover:text-white transition-colors duration-200">{{ __('text.home') }}</a></li>
          <li><a href="{{ route('catalog') }}" wire:navigate class="hover:text-white transition-colors duration-200">{{ __('text.catalog') }}</a></li>
          <li><a href="{{ route('contacts') }}" wire:navigate class="hover:text-white transition-colors duration-200">{{ __('text.contacts') }}</a></li>
        </ul>
      </div>

      <div class="space-y-5">
        <h3 class="text-lg font-bold">{{ __('text.contact-us') }}</h3>
        <p class="text-gray-400">{{ __('text.address') }}</p>
        <p class="text-gray-400">dimknit@gmail.com</p>
        <p class="text-gray-400">+00000000000</p>
      </div>
    </div>

    <div class=" mt-12 text-center text-white/30 flex justify-center items-center py-6">
      <p>© 2025 DimKnit Store. {{ __('text.all-rights-reserved') }}</p>
    </div>
  </div>
</footer>
