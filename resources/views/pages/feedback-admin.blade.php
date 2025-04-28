<x-admin-layout>
    <div class="mb-6 flex items-center justify-between" data-module="feedback">
        <div>
            <div class="flex gap-8 items-center">
                <h1 class="font-bold text-lg md:text-2xl">Manage Feedback</h1>
                <x-loader></x-loader>
            </div>
            <p class="text-black/50 text-[.8rem] md:text-base">Manage and respond to user reports.</p>
        </div>
    </div>

    <form action="" method="" id="filterForm">
        <div class="mb-6 flex flex-wrap gap-3 items-center justify-between">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                <div class="relative inline-block w-50">
                    <select
                        class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0"
                        onchange="document.getElementById('filterForm').submit()" name="star_rating">
                        <option value="" selected>Star Rating</option>
                        <option value="1" @selected(request('star_rating') === '1')>1</option>
                        <option value="2" @selected(request('star_rating') === '2')>2</option>
                        <option value="3" @selected(request('star_rating') === '3')>3</option>
                        <option value="4" @selected(request('star_rating') === '4')>4</option>
                        <option value="5" @selected(request('star_rating') === '5')>5</option>
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                        <svg class="w-8 h-8 fill-current text-btn" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20">
                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                        </svg>
                    </div>
                </div>

                <div class="relative inline-block w-50">
                    <select
                        class="appearance-none bg-primary text-white text-center font-bold rounded-sm py-2 w-full outline-0"
                        onchange="document.getElementById('filterForm').submit()" name="order">
                        <option value="" disabled selected>Sort By</option>
                        <option value="desc" @selected(request('order') === 'desc')>Newest</option>
                        <option value="asc" @selected(request('order') === 'asc')>Oldest</option>
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
                    placeholder="Search..." value="{{ request('search') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white absolute left-2 bottom-1/4"
                    fill="currentColor" viewBox="0 0 512 512">
                    <path
                        d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z" />
                </svg>
            </div>
        </div>
    </form>

    <div class="grid grid-cols-1 gap-6" id="feedbacksList">

        @if (!$feedbacks->isEmpty())
            @foreach ($feedbacks as $feedback)
                <div class="bg-primary w-full flex justify-between items-center rounded-sm py-2 px-4">
                    <div class="flex items-center gap-3">
                        <div class="h-8 w-8 rounded-full bg-btn flex items-center justify-center text-black font-medium uppercase">
                            {{ Str::substr(optional($feedback)->user->name, 0, 2) }}
                        </div>
                        <div class="flex flex-col justify-center">
                            <p class="text-white text-[.9rem] md:ext-lg font-bold">{{ $feedback->user->name }}</p>
                            <p class="text-white text-[.8rem] md:ext-lg">{{ $feedback->comment }}</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="flex gap-1">
                            @for ($i = 0; $i < $feedback->star_rating; $i++)
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"
                                    class="w-3 h-3 md:w-5 md:h-5 text-yellow-500 cursor-pointer">
                                    <path fill="currentColor"
                                        d="M316.9 18C311.6 7 300.4 0 288.1 0s-23.4 7-28.8 18L195 150.3 51.4 171.5c-12 1.8-22 10.2-25.7 21.7s-.7 24.2 7.9 32.7L137.8 329 113.2 474.7c-2 12 3 24.2 12.9 31.3s23 8 33.8 2.3l128.3-68.5 128.3 68.5c10.8 5.7 23.9 4.9 33.8-2.3s14.9-19.3 12.9-31.3L438.5 329 542.7 225.9c8.6-8.5 11.7-21.2 7.9-32.7s-13.7-19.9-25.7-21.7L381.2 150.3 316.9 18z" />
                                </svg>
                            @endfor
                        </div>

                        <div class="flex items-center gap-2">
                            <button data-modal-target="modalInformationFeedback" data-modal-key="showModalInfoFeedback"
                                data-id="{{ $feedback->id }}"
                                class="bg-white cursor-pointer rounded-sm text-primary p-1 md:p-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 md:w-5 md:h-5"
                                    fill="currentColor" viewBox="0 0 512 512">
                                    <path
                                        d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm0-384c13.3 0 24 10.7 24 24l0 112c0 13.3-10.7 24-24 24s-24-10.7-24-24l0-112c0-13.3 10.7-24 24-24zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z" />
                                </svg>
                            </button>
                            <form action="{{ route('feedback-admin.delete', $feedback->id) }}" method="POST"
                                onsubmit="return confirm('Are you sure to want delete this?')">
                                @csrf
                                @method('DELETE')
                                <button class="p-2 rounded bg-red-600 text-white hover:bg-red-700">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="currentColor"
                                        viewBox="0 0 448 512">
                                        <path
                                            d="M135.2 17.7C140.6 7.1 151.3 0 163.2 0h121.6c11.9 0 22.6 7.1 28 17.7L328 32h88c13.3 0 24 10.7 24 24s-10.7 24-24 24h-16l-21.2 339.3c-1.6 25.5-22.9 45.7-48.5 45.7H117.7c-25.6 0-46.9-20.2-48.5-45.7L48 80H32c-13.3 0-24-10.7-24-24S18.7 32 32 32h88l15.2-14.3zM182.6 160c-6.6 0-12 5.4-12 12v208c0 6.6 5.4 12 12 12s12-5.4 12-12V172c0-6.6-5.4-12-12-12zm82.8 0c-6.6 0-12 5.4-12 12v208c0 6.6 5.4 12 12 12s12-5.4 12-12V172c0-6.6-5.4-12-12-12z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="bg-primary w-full flex justify-center items-center rounded-sm py-4 px-4">
                <h1 class="text-gray-300 text-lg md:text-xl text-center font-semibold">
                    No data found
                </h1>
            </div>
        @endif
    </div>
    
    {{-- Pagination  --}}
    <div id="pagination-container">
        {{ $feedbacks->links('pagination.history-user-pagination') }}
    </div>

    @include('pages.feedback-information-admin')
</x-admin-layout>
