@if ($paginator->hasPages())
    <div class="flex justify-end mt-6">
        <nav class="inline-flex rounded-lg shadow-sm overflow-hidden" aria-label="Pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span
                    class="relative inline-flex items-center px-3 py-2 bg-gray-100 text-gray-400 cursor-not-allowed border-r border-gray-200">
                    <span class="sr-only">Previous</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 bg-white hover:bg-primary text-gray-700 hover:text-white transition-colors duration-200 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-inset">
                    <span class="sr-only">Previous</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </a>
            @endif

            {{-- Page Number Links (for desktop) --}}
            <div class="hidden md:flex">
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <span
                            class="relative inline-flex items-center px-4 py-2 bg-white text-gray-700 border-r border-gray-200">
                            {{ $element }}
                        </span>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span
                                    class="relative inline-flex items-center px-4 py-2 bg-primary text-white font-medium border-r border-gray-200">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}"
                                    class="relative inline-flex items-center px-4 py-2 bg-white hover:bg-primary text-gray-700 hover:text-white transition-colors duration-200 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-inset">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>

            {{-- Page Number Info (for mobile) --}}
            <div class="flex md:hidden items-center px-4 py-2 bg-white text-gray-700 border-r border-gray-200">
                <span>{{ $paginator->currentPage() }} of {{ $paginator->lastPage() }}</span>
            </div>

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"
                    class="relative inline-flex items-center px-3 py-2 bg-white hover:bg-primary text-gray-700 hover:text-white transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-inset">
                    <span class="sr-only">Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </a>
            @else
                <span class="relative inline-flex items-center px-3 py-2 bg-gray-100 text-gray-400 cursor-not-allowed">
                    <span class="sr-only">Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </span>
            @endif
        </nav>
    </div>
@endif
