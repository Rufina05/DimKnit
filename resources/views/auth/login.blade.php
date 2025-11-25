@extends("layout")

@section("main")

<div class="grid grid-cols-12 gap-4 relative">
  <div class="col-span-12">
    <section class="min-h-[90vh] md:min-h-screen grid md:grid-cols-2">

      <!-- Left Image Panel -->
      <div class="hidden md:block bg-gray-100 h-full">
        <img src="{{ asset('storage/banners/login.png') }}" 
             alt="Login Illustration" 
             class="w-full h-full object-cover object-center">
      </div>

      <!-- Right Form Panel -->
      <div class="flex items-start justify-center p-6 sm:p-12 lg:p-16 bg-gray-50">
        <div class="w-full max-w-xl bg-white rounded-2xl p-8 sm:p-12 mt-16">

          <!-- Title -->
          <div class="mb-8 text-left"> 
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-black uppercase tracking-wide">Log in to Dimknit</h2>
            <p class="text-gray-500 mt-2 text-sm sm:text-base md:text-lg">Enter your details here</p>
          </div>

          <!-- Form -->
          <form action="{{ route('login.post') }}" method="POST" class="space-y-8">
            @csrf

            <div>
              <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required
                     class="w-full px-4 py-3 sm:px-5 sm:py-4 border-0 border-b-2 border-gray-200 bg-gray-50 text-sm sm:text-base placeholder-gray-400 focus:border-red-600 focus:ring-0 focus:outline-none transition-all duration-200">
              @error('email') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div>
              <input type="password" name="password" placeholder="Password" required
                     class="w-full px-4 py-3 sm:px-5 sm:py-4 border-0 border-b-2 border-gray-200 bg-gray-50 text-sm sm:text-base placeholder-gray-400 focus:border-red-600 focus:ring-0 focus:outline-none transition-all duration-200">
              @error('password') <span class="text-red-600 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col justify-start mt-4">
              <button type="submit" 
                      class="inline-block px-10 sm:px-12 md:px-16 bg-red-500 hover:bg-red-700 text-white py-4 sm:py-5 text-base sm:text-lg md:text-xl font-bold rounded-md transition duration-300">
                Login
              </button>
            </div>

            <p class="text-left text-gray-500 mt-4 text-sm sm:text-base">
              Don't have an account? 
              <a href="{{ route('register') }}" wire:navigate class="text-red-600 font-semibold hover:underline">Register</a>
            </p>
          </form>

        </div>
      </div>

    </section>
  </div>
</div>
@endsection
