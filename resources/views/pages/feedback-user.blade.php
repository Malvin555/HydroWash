<x-user-layout>
    {{-- feedback --}}
    <section class="h-screen bg-gradient-to-t from-primary to-btn relative py-24">
        <div class="px-[2%]">
            <x-back-to-home></x-back-to-home>

            <div class="w-full mt-5 grid grid-cols-1 md:grid-cols-2 gap-2">
                <div
                    class="bg-gradient-to-b mb-3 md:mb-0 from-[#6E91A2] via-[#8F8C8C] to-[#FFFDFD] py-10 px-2 rounded-md w-full">
                    <div class="flex items-center gap-2 mb-3">
                        <img src="{{ asset('img/laundry2.svg') }}" alt="laundry" class="w-12 h-12 md:w-14 md:h-14">
    
                        <div>
                            <h1 class="text-primary lg:text-xl font-bold">Send us your feedback!</h1>
                            <p class="text-[.8rem] lg:text-sm">Let out all your opinions, because it can make us grow</p>
                        </div>
                    </div>
    
                    <form action="{{ route('feedback') }}" method="post">
                        @csrf
    
                        <div class="w-full flex flex-col justify-center items-center">
                            <div class="flex gap-2 md:gap-4 lg:gap-7 mb-3 items-center" id="stars">
                                <svg data-rating="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-5 h-5 md:w-7 md:h-7
                                    {{ $errors->has('rating') ? 'text-red-600': 'text-primary' }}
                                    cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                                <svg data-rating="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-5 h-5 md:w-7 md:h-7
                                    {{ $errors->has('rating') ? 'text-red-600': 'text-primary' }}
                                    cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                                <svg data-rating="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-5 h-5 md:w-7 md:h-7
                                    {{ $errors->has('rating') ? 'text-red-600': 'text-primary' }}
                                    cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                                <svg data-rating="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-5 h-5 md:w-7 md:h-7
                                    {{ $errors->has('rating') ? 'text-red-600': 'text-primary' }}
                                    cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                                <svg data-rating="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-5 h-5 md:w-7 md:h-7
                                    {{ $errors->has('rating') ? 'text-red-600': 'text-primary' }}
                                    cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                            </div>
                            <input type="hidden" name="rating" id="ratingValue" value="">
    
                            <textarea name="comment" id="feedback" rows="10"
                                class="bg-white w-full rounded-sm outline-0 placeholder:text-[.7rem] md:placeholder:text-sm placeholder:text-black pl-2 mb-3 
                                @error('comment')
                                    border-2 border-red-600
                                @enderror "
                                placeholder="What can we do to improve your experience?">{{ old('comment') }}</textarea>
    
                            <button type="submit"
                                class="bg-primary text-white text-[.8rem] md:text-sm lg:text-lg py-2 w-full rounded-sm">Submit
                                My Feedback</button>
                        </div>
                    </form>
                </div>
    
                <div class="max-h-[450px] overflow-y-auto">
    
                    @if ($feedbacks->isNotEmpty())
                        @foreach ($feedbacks as $feedback)
                            <div class="bg-white rounded-sm p-2 flex justify-between mb-3">
                                <div class="flex gap-2">
                                    <img src="{{ asset('img/profile-img.png') }}" alt="profile"
                                        class="w-10 h-10 md:w-14 md:h-14">
                                    <div class="text-primary">
                                        <h1 class="text-sm font-bold">{{ $feedback->user->name }}</h1>
                                        <p class="text-[.7rem]">
                                            {{ \Carbon\Carbon::parse($feedback->created_at)->format('d/m/Y') }}</p>
                                        <p class="text-[.8rem]">{{ $feedback->comment }}</p>
                                    </div>
                                </div>
    
                                <div class="flex gap-2">
                                    @for ($i = 0; $i < $feedback->star_rating; $i++)
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                            class="w-3 h-3 text-yellow-500 cursor-pointer">
                                            <path fill="currentColor"
                                                d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                        </svg>
                                    @endfor
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white rounded-sm p-5 flex justify-between mb-3">
                            <div class="flex items-center justify-center gap-4">
                                <p class="text-primary text-center">No Feedbacks</p>
                            </div>
                        </div>
                    @endif
    
                </div>
            </div>
        </div>


        <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-primary to-transparent z-10"></div>
    </section>
</x-user-layout>
