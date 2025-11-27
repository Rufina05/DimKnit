<footer class="bg-black text-white mt-5 pt-20">
  <div class="max-w-7xl mx-auto pt-5 px-4 lg:px-8">
  
    <div class="grid mt-5 grid-cols md:grid-cols-2 lg:grid-cols-4 gap-8">

      <div class="space-y-5">
        <h3 class="text-lg font-bold">Connect with us</h3>
        <p class="text-gray-400">Follow us on social media</p>
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
        <h3 class="text-lg font-bold">Quick Links</h3>
        <ul class="space-y-3 text-gray-400">
          <li><a href="{{ route('home') }}" wire:navigate class="hover:text-white transition-colors duration-200">Home</a></li>
          <li><a href="{{ route('catalog') }}" wire:navigate class="hover:text-white transition-colors duration-200">Catalog</a></li>
          <li><a href="{{ route('contacts') }}" wire:navigate class="hover:text-white transition-colors duration-200">Contacts</a></li>
        </ul>
      </div>

      <div class="space-y-5">
        <h3 class="text-lg font-bold">Subscribe</h3>
        <p class="text-gray-400">Get 10% off your first order</p>
        <div class="flex items-center gap-2 rounded-md border border-gray-500 bg-black text-white">
          <input type="email" placeholder="Enter your email" class=" w-full p-2 px-4 placeholder-gray-400 rounded-full bg-black">
          <button class="text-gray-400 hover:text-white px-4 py-2 rounded-lg flex justify-center items-center">
            <x-bi-telegram  class="text-lg hover:scale-105 duration-200" />
          </button>
        </div>
      </div>

      <div class="space-y-5">
        <h3 class="text-lg font-bold">Contact Us</h3>
        <p class="text-gray-400">Lorem ipsum dolor sit amet consectetur.</p>
        <p class="text-gray-400">dimknit@gmail.com</p>
        <p class="text-gray-400">+00000000000</p>
      </div>
    </div>

    <div class=" mt-12 text-center text-white/30 flex justify-center items-center py-6">
      <p>© 2025 DimKnit Store. All rights reserved.</p>
    </div>
  </div>
</footer>
