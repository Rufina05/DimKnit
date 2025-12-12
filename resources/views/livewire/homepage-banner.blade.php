<section class="pt-10 rounded-xl mb-2.5 bg-white">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 items-stretch gap-8 sm:gap-12 min-h-[80vh]">

      <div class="flex flex-col justify-center text-center lg:text-left space-y-6 lg:space-y-8">
        <p class="text-base font-semibold tracking-wider text-red-900 uppercase">
          {{ __('text.gift-ideas') }}
        </p>

        <h1 class="text-4xl font-bold text-black sm:text-5xl md:text-6xl xl:text-7xl">
          {{ __('text.welcome-to') }} DimKnit
        </h1>

        <p class="text-base text-black sm:text-lg md:text-xl">
          {{ __('text.p-message') }}
        </p>

        <a href="{{ route('catalog') }}" wire:navigate class="inline-flex items-center px-6 py-4 font-semibold text-white bg-red-900 rounded-full hover:text-red-200 focus:text-red-200 w-max transition-colors duration-200"role="button">
          {{ __('text.shop-now') }}
          <x-bi-arrow-right-circle class="w-6 h-6 ml-2" />
        </a>
        <p class="text-gray-600">
          '{{ __('text.do-you-want-to-by') }}'
          <a href="{{ route('login') }}" wire:navigate class="text-black font-semibold hover:underline">{{ __('text.sign-up-now') }}</a>
        </p>
      </div>

      <div class="flex justify-center lg:justify-end items-center w-full">
        <img class="w-full h-auto rounded-xl" src="{{ asset('storage/banners/hero.png') }}" alt="Hero Image" />
      </div>
    </div>
  </div>
</section>
