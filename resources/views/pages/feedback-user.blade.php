<x-user-layout>
    {{-- feedback --}}
    <section class="min-h-screen bg-gradient-to-b from-white via-[#e6f7f9] to-[#d0f0f5] relative py-16 md:py-24">
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            <div class="max-w-7xl mx-auto mt-3">
                <x-back-to-home></x-back-to-home>
                <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-primary text-center mb-2">Your Feedback Matters</h1>
                <p class="text-gray-600 text-center mb-8 max-w-2xl mx-auto">Help us improve our services by sharing your experience. Your insights drive our continuous improvement.</p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-10">
                    <!-- Feedback Form Card -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="bg-gradient-to-r from-primary to-[#2a7d8f] p-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                                    <img src="{{ asset('img/laundry2.svg') }}" alt="laundry" class="w-8 h-8 md:w-10 md:h-10">
                                </div>
                                <div class="text-white">
                                    <h2 class="font-bold text-lg md:text-xl">Share Your Experience</h2>
                                    <p class="text-sm text-white text-opacity-90">Your feedback helps us grow</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <form action="{{ route('feedback') }}" method="post" id="feedbackForm">
                                @csrf
                                
                                <div class="mb-6">
                                    <label class="block text-gray-700 font-medium mb-3">How would you rate our service?</label>
                                    <div class="flex justify-center">
                                        <div class="flex gap-2 md:gap-3" id="stars">
                                            @for ($i = 1; $i <= 5; $i++)
                                                <svg data-rating="{{ $i }}" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                    class="w-8 h-8 md:w-10 md:h-10 star-icon transition-all duration-200 hover:scale-110
                                                    {{ $errors->has('rating') ? 'text-red-400' : 'text-gray-300' }}
                                                    cursor-pointer">
                                                    <path fill="currentColor"
                                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                </svg>
                                            @endfor
                                        </div>
                                    </div>
                                    <div class="text-center mt-2">
                                        <span id="ratingText" class="text-sm font-medium text-gray-500">Click to rate</span>
                                    </div>
                                    @error('rating')
                                        <p class="mt-1 text-sm text-red-600 text-center">{{ $message }}</p>
                                    @enderror
                                    <input type="hidden" name="rating" id="ratingValue" value="{{ old('rating') }}">
                                </div>
                                
                                <div class="mb-6">
                                    <label for="feedback" class="block text-gray-700 font-medium mb-2">Your Comments</label>
                                    <textarea name="comment" id="feedback" rows="5"
                                        class="w-full px-4 py-3 border rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-colors
                                        @error('comment') border-red-500 @else border-gray-300 @enderror"
                                        placeholder="Tell us what you liked or how we can improve...">{{ old('comment') }}</textarea>
                                    @error('comment')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <button type="submit"
                                    class="w-full bg-primary hover:bg-primary-dark rounded-lg cursor-pointer text-white py-4 px-6 font-medium shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative overflow-hidden group focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                    Submit Feedback
                                </button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Feedback List Card -->
                    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
                        <div class="bg-gradient-to-r from-[#2a7d8f] to-primary p-4">
                            <div class="flex items-center gap-3">
                                <div class="bg-white bg-opacity-20 p-2 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 md:h-10 md:w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8h2a2 2 0 012 2v6a2 2 0 01-2 2h-2v4l-4-4H9a1.994 1.994 0 01-1.414-.586m0 0L11 14h4a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2v4l.586-.586z" />
                                    </svg>
                                </div>
                                <div class="text-white">
                                    <h2 class="font-bold text-lg md:text-xl">Community Feedback</h2>
                                    <p class="text-sm text-white text-opacity-90">What others are saying</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 max-h-[500px] overflow-y-auto feedback-list">
                            @if ($feedbacks->isNotEmpty())
                                @foreach ($feedbacks as $feedback)
                                    <div class="bg-gray-50 rounded-lg p-4 mb-4 transition-all duration-200 hover:shadow-md">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0">
                                                <div class="w-10 h-10 md:w-12 md:h-12 bg-primary bg-opacity-10 rounded-full flex items-center justify-center text-white font-bold">
                                                    {{ Str::substr(strtoupper($feedback->user->name), 0, 2) }}
                                                </div>
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <div class="flex justify-between items-start">
                                                    <div>
                                                        <h3 class="font-medium text-gray-800">{{ $feedback->user->name }}</h3>
                                                        <p class="text-xs text-gray-500">
                                                            {{ \Carbon\Carbon::parse($feedback->created_at)->format('d M Y, h:i A') }}
                                                        </p>
                                                    </div>
                                                    <div class="flex">
                                                        @for ($i = 0; $i < $feedback->star_rating; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                                class="w-4 h-4 text-yellow-400">
                                                                <path fill="currentColor"
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                            </svg>
                                                        @endfor
                                                        @for ($i = $feedback->star_rating; $i < 5; $i++)
                                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                                                class="w-4 h-4 text-gray-300">
                                                                <path fill="currentColor"
                                                                    d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                                            </svg>
                                                        @endfor
                                                    </div>
                                                </div>
                                                <div class="mt-2 text-gray-700 text-sm">
                                                    {{ $feedback->comment }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="flex flex-col items-center justify-center py-12 text-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                    <h3 class="text-lg font-medium text-gray-700 mb-1">No Feedback Yet</h3>
                                    <p class="text-gray-500 max-w-xs">Be the first to share your experience with our services!</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Decorative wave at bottom -->
        <div class="absolute bottom-0 left-0 w-full overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="w-full h-auto fill-primary opacity-20">
                <path d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
            </svg>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stars = document.querySelectorAll('.star-icon');
            const ratingInput = document.getElementById('ratingValue');
            const ratingText = document.getElementById('ratingText');
            const ratingTexts = [
                'Click to rate',
                'Poor',
                'Fair',
                'Good',
                'Very Good',
                'Excellent'
            ];
            
            // Initialize stars if there's a previous rating
            if (ratingInput.value) {
                updateStars(parseInt(ratingInput.value));
            }
            
            // Add click event to stars
            stars.forEach(star => {
                star.addEventListener('click', function() {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    ratingInput.value = rating;
                    updateStars(rating);
                });
                
                // Add hover effects
                star.addEventListener('mouseenter', function() {
                    const rating = parseInt(this.getAttribute('data-rating'));
                    highlightStars(rating);
                    ratingText.textContent = ratingTexts[rating];
                });
                
                star.addEventListener('mouseleave', function() {
                    const currentRating = parseInt(ratingInput.value) || 0;
                    highlightStars(currentRating);
                    ratingText.textContent = ratingTexts[currentRating];
                });
            });
            
            // Function to update stars based on rating
            function updateStars(rating) {
                stars.forEach(star => {
                    const starRating = parseInt(star.getAttribute('data-rating'));
                    if (starRating <= rating) {
                        star.classList.add('text-yellow-400');
                        star.classList.remove('text-gray-300');
                    } else {
                        star.classList.add('text-gray-300');
                        star.classList.remove('text-yellow-400');
                    }
                });
                ratingText.textContent = ratingTexts[rating];
            }
            
            // Function to highlight stars on hover
            function highlightStars(rating) {
                stars.forEach(star => {
                    const starRating = parseInt(star.getAttribute('data-rating'));
                    if (starRating <= rating) {
                        star.classList.add('text-yellow-400');
                        star.classList.remove('text-gray-300');
                    } else {
                        star.classList.add('text-gray-300');
                        star.classList.remove('text-yellow-400');
                    }
                });
            }
            
            // Add smooth scrolling for feedback list
            const feedbackList = document.querySelector('.feedback-list');
            if (feedbackList) {
                feedbackList.addEventListener('scroll', function() {
                    requestAnimationFrame(function() {
                        const scrollTop = feedbackList.scrollTop;
                        const feedbackItems = feedbackList.querySelectorAll('.bg-gray-50');
                        
                        feedbackItems.forEach(item => {
                            const itemTop = item.offsetTop;
                            const itemHeight = item.offsetHeight;
                            const distance = (itemTop - scrollTop) / itemHeight;
                            
                            if (distance > -1 && distance < 1.5) {
                                item.style.transform = 'scale(1)';
                                item.style.opacity = '1';
                            } else {
                                item.style.transform = 'scale(0.98)';
                                item.style.opacity = '0.8';
                            }
                        });
                    });
                });
            }
        });
    </script>
</x-user-layout>