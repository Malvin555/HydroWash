<x-user-layout>
    {{-- profile  --}}
    <section class="h-full relative py-24">
        <div class="px-[5%]">
          <div class="mb-5">
            <h1 class="text-xl md:text-2xl lg:text-4xl text-primary font-bold drop-shadow-[0_4px_1px_rgba(0,0,0,0.2)]">Your Profile</h1>
            <p class="text-sm md:text-lg lg:text-xl">Manage your account information and preferences.</p>
          </div>
  
          <div class="w-full border border-primary rounded-sm pb-5 mb-6">
            <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
              <div>
                <h1 class="font-bold md:text-lg lg:text-2xl">Personal Information</h1>
                <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your personal detail.</p>
              </div>
  
              <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
            </div>
  
            <form action="" method="" class="px-3">
              <div class="w-full mb-5">
                <input type="email" id="email" name="email" value="Maria@gmail.com" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-primary">
              </div>
  
              <div class="w-full mb-5">
                <input type="text" id="username" name="username" value="MARIA" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-primary">
              </div>
  
              <div class="w-full flex gap-4 mb-5">
                <input type="text" class="w-full bg-secondary rounded-sm py-1 px-2 text-primary outline-0" value="Jln Raya Kelod Kangin">
                <input type="text" class="w-full bg-secondary rounded-sm py-1 px-2 text-primary outline-0" value="081234567891">
              </div>
              
              <div class="w-full flex justify-end">
                <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm">Submit</button>
              </div>
            </form>
          </div>
  
  
          <div class="w-full border border-primary rounded-sm pb-5">
            <div class="bg-primary mb-5 rounded-b-sm text-white flex justify-between items-center px-3 py-2">
              <div>
                <h1 class="font-bold md:text-lg lg:text-2xl">Password</h1>
                <p class="font-light text-[.8rem] md:text-sm lg:text-base">Update your password.</p>
              </div>
  
              <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-6 h-6 md:w-8 md:h-8">
            </div>
  
            <form action="" method="" class="px-3">
              <div class="w-full mb-5">
                <input type="password" id="password" name="password" placeholder="Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-primary">
              </div>
  
              <div class="w-full mb-5">
                <input type="password" id="new-password" name="new-password" placeholder="New Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-primary">
              </div>
          
              <div class="w-full mb-5">
                <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm Password" class="w-full bg-secondary rounded-sm py-1 px-2 outline-0 text-primary">
              </div>
              
              <div class="w-full flex justify-end">
                <button type="submit" class="bg-primary text-white py-1 px-4 rounded-sm">Submit</button>
              </div>
            </form>
          </div>
  
        </div>
  
        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
      </section>
</x-user-layout>
