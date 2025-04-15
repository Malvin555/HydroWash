<section class="h-screen pt-25 bg-primary relative" id="review">
    <div class="max-w-screen-xl h-full mx-auto px-[10%] lg:px-[5%]">
        <div class="w-full flex justify-end mb-5 md:mb-20">
            <div class="w-35 md:w-75 bg-white py-3 rounded">
                <h1 class="text-center text-primary text-sm md:text-2xl">What our clients say</h1>
            </div>
        </div>

        <div class="w-full relative">
            <!-- Left Arrow -->
            <div class="absolute left-[-3rem] top-1/2 z-10">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 md:w-15 md:h-15 lg:w-20 lg:h-20 text-white cursor-pointer"
                    viewBox="0 0 320 512" onclick="prevReview()">
                    <path fill="currentColor"
                        d="M41.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.3 256 246.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
                </svg>
            </div>

            <div class="overflow-hidden w-full">
                <div id="reviewWrapper" class="flex mx-5 transition-transform duration-500 ease-in-out w-full">
                    <!-- Review 1 -->
                    <div class="w-full flex-shrink-0 text-white px-4">
                        <div class="flex items-center gap-2 mb-4">
                            <img src="{{ asset('img/profile-img.png') }}" alt="profile"
                                class="w-10 h-10 md:w-15 md:h-15">
                            <div>
                                <h1 class="text-lg md:text-xl">MARIA</h1>
                                <p class="text-[.7rem] md:text-sm">07/08/2025</p>
                            </div>
                        </div>
                        <p class="text-[.9rem] md:text-lg lg:text-2xl">
                            Bubble Laundry is a lifesaver! Their Wash & Fold service is top-notch. My clothes come
                            back
                            looking perfect every time, and the pickup and delivery are incredibly convenient.
                        </p>
                    </div>

                    <!-- Review 2 -->
                    <div class="w-full flex-shrink-0 text-white px-4">
                        <div class="flex items-center gap-2 mb-4">
                            <img src="{{ asset('img/profile-img.png') }}" alt="profile"
                                class="w-10 h-10 md:w-15 md:h-15">
                            <div>
                                <h1 class="text-lg md:text-xl">JAMES</h1>
                                <p class="text-[.7rem] md:text-sm">10/08/2025</p>
                            </div>
                        </div>
                        <p class="text-[.9rem] md:text-lg lg:text-2xl">
                            Super easy process and great customer service. Bubble Laundry made my busy week a lot
                            easier!
                        </p>
                    </div>
                </div>
            </div>

            <!-- Right Arrow -->
            <div class="absolute right-[-3rem] top-1/2 z-10">
                <svg xmlns="http://www.w3.org/2000/svg"
                    class="w-10 h-10 md:w-15 md:h-15 lg:w-20 lg:h-20 text-white cursor-pointer"
                    viewBox="0 0 320 512" onclick="nextReview()">
                    <path fill="currentColor"
                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z" />
                </svg>
            </div>
        </div>
    </div>
</section>