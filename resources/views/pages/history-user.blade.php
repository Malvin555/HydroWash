<x-user-layout>
    {{-- history --}}
  <section class="h-screen pt-24">

    <div class="px-[5%]">
      <div class="mb-5">
        <h1 class="text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Your Service History</h1>
        <p class="text-sm md:text-lg lg:text-xl">Track Your Order Here</p>
      </div>

      <div class="w-full mb-7 grid grid-cols-1 md:grid-cols-3 gap-2 bg-secondary p-3 rounded-sm">
        <div class="relative inline-block w-full">
          <select class="appearance-none bg-btn font-bold rounded-sm py-2 pl-3 w-full outline-0">
            <option value="" disabled selected>All Types</option>
            <option value="test1">Test 1</option>
            <option value="test2">Test 2</option>
          </select>

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
            </svg>
          </div>
        </div>
      
        <div class="relative inline-block w-full">
          <select class="appearance-none bg-btn font-bold rounded-sm py-2 pl-3 w-full outline-0">
            <option value="" disabled selected>All Status</option>
            <option value="test1">Test 1</option>
            <option value="test2">Test 2</option>
          </select>

          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="w-8 h-8 fill-current text-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
              <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
            </svg>
          </div>
        </div>

        <div class="w-full relative">
          <input type="text" id="search" name="search" class="bg-btn rounded-sm outline-0 placeholder:text-gray-900 py-2 pl-3 w-full font-bold" placeholder="Search...">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 absolute right-2 bottom-1/4" viewBox="0 0 512 512">
            <path d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z"/>
          </svg>
        </div>
      </div>

      <div class="w-full flex flex-col gap-3">
        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-btn w-[6rem] md:w-[60%] rounded-sm text-[#6D6969] text-[.8rem] font-bold py-1 px-4 text-center">
              Pending
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>


        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-proccess w-[6rem] md:w-[60%] rounded-sm text-[#9F8D04] text-[.8rem] font-bold py-1 px-4 text-center">
              Proccess
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>


        <div id="openModal" class="w-full bg-secondary cursor-pointer rounded-sm flex items-center justify-between py-2 px-6">
          <div>
            <h1 class="text-primary md:text-lg font-semibold">Laundry #22872</h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 384 512">
                <path d="M215.7 499.2C267 435 384 279.4 384 192C384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2c12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/>
              </svg>
              jln raya delod kangin
            </p>
          </div>

          <div class="flex flex-col items-end">
            <h1 class="bg-success w-[6rem] md:w-[60%] rounded-sm text-[#399707] text-[.8rem] font-bold py-1 text-center">
              Completed
            </h1>
            <p class="text-[.6rem] md:text-sm flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2" viewBox="0 0 448 512">
                <path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm80 64c-8.8 0-16 7.2-16 16l0 96c0 8.8 7.2 16 16 16l96 0c8.8 0 16-7.2 16-16l0-96c0-8.8-7.2-16-16-16l-96 0z"/>
              </svg>
              Submitted at 31 February 2090
            </p>
          </div>
        </div>

        <div class="rounded-sm flex justify-end">
          <div class="px-3 bg-secondary rounded-sm">
            <div class="flex py-3 w-45 justify-center items-center gap-2 text-black relative">
                <span class="bg-primary text-white p-1 rounded-sm absolute left-0 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 320 512"><path d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
                </span>
                <div>
                    <p>2 0f 3</p>
                </div>
                <span class="bg-primary text-white p-1 rounded-sm absolute right-0 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor" viewBox="0 0 320 512">><path d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z"/></svg>
                </span>
            </div>
          </div>
      </div>
      </div>
    </div>



    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
  </section>


  <!-- Modal information-->
  @include('pages.modal-information-user')
</div>
</x-user-layout>
