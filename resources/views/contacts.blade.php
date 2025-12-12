@extends ("layout")

@section("main")

<!-- ABOUT US  -->
<section class="pt-16 lg:pt-24 pb-16">

    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="space-y-6 flex flex-col justify-center">
                <h1 class="text-4xl md:text-4xl lg:text-5xl font-bold text-gray-900">
                    {{ __('text.about-us') }}
                </h1>
                <p class="text-gray-700 leading-relaxed">
                   {{ __('text.about-p1') }} 
                </p>
                <p class="text-gray-700 leading-relaxed">
                    {{ __('text.about-p2') }}
                </p>
            </div>
            <div>
                <img src="{{ asset('storage/banners/t2.png') }}" 
                     alt="About Us" 
                     class="w-full h-full object-cover rounded-xl shadow-md">
            </div>
        </div>
    </div>
</section>

<!-- CONTACTS -->
<section class="pt-8 pb-16">
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12">
        <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center lg:text-left">{{ __('text.contact-us') }}</h2>

        <div class="grid grid-cols-1 lg:grid-cols-[1fr_1fr] gap-8 items-start">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-lg shadow-lg space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 flex justify-center items-center bg-red-500 text-white rounded-full">
                            <x-eva-phone-outline class="text-xl md:text-2xl" />
                        </div>
                        <h4 class="text-lg md:text-xl font-bold">{{ __('text.call-to-us') }}</h4>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base">{{ __('text.contact-message') }}</p>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">WhatsApp: +000000000</p>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Viber: +000000000</p>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">Telegram: +000000000</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg space-y-3">
                    <div class="flex items-center gap-3">
                        <div class="h-10 w-10 flex justify-center items-center bg-red-500 text-white rounded-full">
                            <x-bi-envelope class="text-xl md:text-2xl" />
                        </div>
                        <h4 class="text-lg md:text-xl font-bold">{{ __('text.email-us') }}</h4>
                    </div>
                    <p class="text-gray-600 text-sm md:text-base">{{ __('text.email-message') }}</p>
                    <p class="text-gray-600 font-semibold text-sm md:text-base">dimknit@gmail.com</p>
                </div>
            </div>

            <div class="bg-white p-6 md:p-8 rounded-lg shadow-lg">
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <input type="text" name="name" placeholder="Your Name *" required
                               class="mt-1 block w-full px-4 py-3 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 text-sm md:text-base">
                        <input type="email" name="email" placeholder="Your Email *" required
                               class="mt-1 block w-full px-4 py-3 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 text-sm md:text-base">
                        <input type="tel" name="phone" placeholder="Your Phone *" required
                               class="mt-1 block w-full px-4 py-3 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 text-sm md:text-base">
                    </div>
                    <div>
                        <textarea name="message" rows="4" placeholder="Your Message"
                                  class="mt-1 block w-full px-4 py-3 bg-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500 text-sm md:text-base"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="w-full sm:w-auto bg-red-500 text-white px-6 md:px-8 py-3 md:py-4 rounded-md hover:bg-red-600 transition-colors text-sm md:text-base">
                            {{ __('text.send-message') }}
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>

<div class="my-16">
     @livewire('div-guarantee') 
</div>
@endsection
