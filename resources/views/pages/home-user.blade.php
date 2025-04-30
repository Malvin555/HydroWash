<x-user-layout>
  {{-- home --}}
  <section class="min-h-screen relative bg-cover bg-center py-12 md:py-16 lg:py-24" style="background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.7)), url('{{ asset('img/bg-user.png') }}')">
      <div class="px-4 sm:px-6 lg:px-8 max-w-7xl mx-auto">
          <!-- Welcome Section -->
          <div class="text-white mb-12 md:mb-16 max-w-3xl">
              <div class="inline-block bg-primary/20 backdrop-blur-sm px-4 py-1 rounded-full mb-4">
                  <p class="text-teal-200 font-medium">Welcome to HydroWash</p>
              </div>
              <h1 class="text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold leading-tight mb-4">
                  Hello, <span class="text-teal-200">{{ ucwords(Auth::user()->name ?? 'User') }}</span>!
              </h1>
              <p class="md:text-lg lg:text-xl opacity-90 max-w-2xl">
                  Customer comfort is our priority. Enjoy premium laundry services tailored just for you.
              </p>
          </div>
          
          <!-- Services Section -->
          <div class="mb-12">
              <h2 class="text-white text-xl md:text-2xl font-semibold mb-6">Our Services</h2>
              <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                  <!-- Laundry Card -->
                  <div class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-primary/20 border border-white/10">
                      <a href="{{ route('laundry') }}" class="block p-1">
                          <div class="bg-primary/90 group-hover:bg-primary rounded-lg p-6 flex flex-col items-center transition-all duration-300">
                              <div class="w-16 h-16 md:w-20 md:h-20 mb-4 transform group-hover:scale-110 transition-transform duration-300">
                                  <img src="{{ asset('img/laundry.svg') }}" alt="Laundry" class="w-full h-full">
                              </div>
                              <h3 class="text-white text-lg md:text-xl font-bold">Laundry</h3>
                          </div>
                          <div class="p-4 text-center">
                              <p class="text-white text-sm">Professional washing and drying services</p>
                              <div class="mt-4 inline-flex items-center text-teal-200 text-sm font-medium">
                                  Get Started
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:ml-2 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                  </svg>
                              </div>
                          </div>
                      </a>
                  </div>

                  <!-- Ironing Card -->
                  <div class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-primary/20 border border-white/10">
                      <a href="{{ route('ironing') }}" class="block p-1">
                          <div class="bg-primary/90 group-hover:bg-primary rounded-lg p-6 flex flex-col items-center transition-all duration-300">
                              <div class="w-16 h-16 md:w-20 md:h-20 mb-4 transform group-hover:scale-110 transition-transform duration-300">
                                  <img src="{{ asset('img/ironing.svg') }}" alt="Ironing" class="w-full h-full">
                              </div>
                              <h3 class="text-white text-lg md:text-xl font-bold">Ironing</h3>
                          </div>
                          <div class="p-4 text-center">
                              <p class="text-white text-sm">Expert pressing and ironing services</p>
                              <div class="mt-4 inline-flex items-center text-teal-200 text-sm font-medium">
                                  Get Started
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:ml-2 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                  </svg>
                              </div>
                          </div>
                      </a>
                  </div>

                  <!-- Feedback Card -->
                  <div class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-primary/20 border border-white/10">
                      <a href="{{ route('feedback') }}" class="block p-1">
                          <div class="bg-primary/90 group-hover:bg-primary rounded-lg p-6 flex flex-col items-center transition-all duration-300">
                              <div class="w-16 h-16 md:w-20 md:h-20 mb-4 transform group-hover:scale-110 transition-transform duration-300">
                                  <img src="{{ asset('img/feedback.svg') }}" alt="Feedback" class="w-full h-full">
                              </div>
                              <h3 class="text-white text-lg md:text-xl font-bold">Feedback</h3>
                          </div>
                          <div class="p-4 text-center">
                              <p class="text-white text-sm">Share your experience with us</p>
                              <div class="mt-4 inline-flex items-center text-teal-200 text-sm font-medium">
                                  Get Started
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:ml-2 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                  </svg>
                              </div>
                          </div>
                      </a>
                  </div>

                  <!-- Profile Card -->
                  <div class="group bg-white/10 backdrop-blur-sm hover:bg-white/20 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-lg hover:shadow-primary/20 border border-white/10">
                      <a href="{{ route('profile') }}" class="block p-1">
                          <div class="bg-primary/90 group-hover:bg-primary rounded-lg p-6 flex flex-col items-center transition-all duration-300">
                              <div class="w-16 h-16 md:w-20 md:h-20 mb-4 transform group-hover:scale-110 transition-transform duration-300">
                                  <img src="{{ asset('img/profile.svg') }}" alt="Profile" class="w-full h-full">
                              </div>
                              <h3 class="text-white text-lg md:text-xl font-bold">Profile</h3>
                          </div>
                          <div class="p-4 text-center">
                              <p class="text-white text-sm">Manage your account settings</p>
                              <div class="mt-4 inline-flex items-center text-teal-200 text-sm font-medium">
                                  Get Started
                                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1 group-hover:ml-2 transition-all duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                  </svg>
                              </div>
                          </div>
                      </a>
                  </div>
              </div>
          </div>
          
          <!-- Quick Stats Section -->
          <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10">
                  <div class="flex items-center">
                      <div class="w-12 h-12 bg-teal-200/20 rounded-lg flex items-center justify-center mr-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                          </svg>
                      </div>
                      <div>
                          <p class="text-white text-sm opacity-80">Active Orders</p>
                          <h4 class="text-white text-2xl font-bold">2</h4>
                      </div>
                  </div>
              </div>
              
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10">
                  <div class="flex items-center">
                      <div class="w-12 h-12 bg-teal-200/20 rounded-lg flex items-center justify-center mr-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                          </svg>
                      </div>
                      <div>
                          <p class="text-white text-sm opacity-80">Completed Orders</p>
                          <h4 class="text-white text-2xl font-bold">8</h4>
                      </div>
                  </div>
              </div>
              
              <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/10">
                  <div class="flex items-center">
                      <div class="w-12 h-12 bg-teal-200/20 rounded-lg flex items-center justify-center mr-4">
                          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-teal-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                      </div>
                      <div>
                          <p class="text-white text-sm opacity-80">Expenses</p>
                          <h4 class="text-white text-2xl font-bold">Rp 250</h4>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>

  <script>
      localStorage.setItem('api_token', {{ Js::from(session("api_token")) }});
      localStorage.setItem('ref_id', {{ Js::from(session("user_id")) }});
  </script>
</x-user-layout>