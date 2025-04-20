<x-admin-layout>
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="font-bold text-lg md:text-2xl">Manage Feedback</h1>
                <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
            </div>
        </div>

        <form action="" method="">
            <div class="mb-6 flex flex-wrap gap-3 items-center justify-between">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                    <div class="relative inline-block w-50">
                        <select class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0">
                            <option value="" disabled selected>Star Rating</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
        
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
    
                    <div class="relative inline-block w-50">
                        <select class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0">
                            <option value="" disabled selected>Sort By</option>
                            <option value="newest">Newest</option>
                            <option value="oldest">Oldest</option>
                        </select>
        
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                            <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                            </svg>
                        </div>
                    </div>
                </div>
    
                <div class="relative">
                    <input type="text" id="search" name="search"
                        class="bg-primary placeholder:text-white/50 text-white/50 rounded-sm outline-0 py-2 pl-10 w-full md:w-70 font-bold"
                        placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white absolute left-2 bottom-1/4" fill="currentColor"
                        viewBox="0 0 512 512">
                        <path
                            d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                    </svg>
                </div>
            </div>
        </form>

        <div class="grid grid-cols-1 gap-6">
            <div class="bg-primary w-full flex justify-between items-center rounded-sm py-2 px-4">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-7 h-7 md:w-15 md:h-15">
                    <p class="text-white text-[.8rem] md:ext-lg">Lorem ipsum dolor sit ame.....</p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="flex gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                    </div>

                    <div class="flex items-center gap-2">
                        <button data-modal-target="modalInformationFeedback" class="bg-white cursor-pointer rounded-sm text-primary p-1 md:p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/></svg>
                        </button>
                        <button id="" class="bg-red-600 rounded-sm text-white p-1 md:p-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-5 md:h-5" fill="currentColor" viewBox="0 0 512 512"><path d="M256 32c14.2 0 27.3 7.5 34.5 19.8l216 368c7.3 12.4 7.3 27.7 .2 40.1S486.3 480 472 480L40 480c-14.3 0-27.6-7.7-34.7-20.1s-7-27.8 .2-40.1l216-368C228.7 39.5 241.8 32 256 32zm0 128c-13.3 0-24 10.7-24 24l0 112c0 13.3 10.7 24 24 24s24-10.7 24-24l0-112c0-13.3-10.7-24-24-24zm32 224a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/></svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @include('pages.feedback-information-admin')
</x-admin-layout>