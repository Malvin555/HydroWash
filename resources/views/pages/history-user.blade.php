<x-user-layout>
    {{-- history --}}
    <section class="min-h-screen bg-gradient-to-b from-white via-[#e6f7f9] to-[#d0f0f5] relative py-16 md:py-24" data-module="historyUser">
        <div class="container mx-auto px-4 md:px-6 relative z-10">
            
            <div class="max-w-6xl mx-auto">
                <x-back-to-home></x-back-to-home>
                <!-- Header Section -->
                <div class="mb-8 mt-5">
                    <div class="flex items-center gap-3 mb-2">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-primary">
                            Your Service History
                        </h1>
                        <x-loader></x-loader>
                    </div>
                    <p class="text-gray-600">Track and manage all your laundry and ironing orders</p>
                </div>
                
                <!-- Filter and Search Section -->
                <div class="bg-white rounded-xl shadow-sm p-5 mb-8">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <form action="{{ route('history') }}" method="get" id="filterForm" class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label for="type-filter" class="block text-sm font-medium text-gray-700 mb-1">Service Type</label>
                                <div class="relative">
                                    <select id="type-filter" class="appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        onchange="document.getElementById('filterForm').submit()" name="type">
                                        <option value="" selected>All Types</option>
                                        <option value="laundry" @selected(request('type')=='laundry')>Laundry</option>
                                        <option value="ironing" @selected(request('type')=='ironing')>Ironing</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label for="status-filter" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <div class="relative">
                                    <select id="status-filter" class="appearance-none w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pr-8 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                        onchange="document.getElementById('filterForm').submit()" name="status">
                                        <option value="" selected>All Status</option>
                                        <option value="pending" @selected(request('status')=='pending')>Pending</option>
                                        <option value="process" @selected(request('status')=='process')>In Process</option>
                                        <option value="completed" @selected(request('status')=='completed')>Completed</option>
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                        <svg class="w-5 h-5 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path d="M5.5 7l4.5 4 4.5-4H5.5z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <div>
                            <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                            <div class="relative">
                                <input type="text" id="search" name="search"
                                    class="w-full bg-gray-50 border border-gray-300 text-gray-700 py-2 px-3 pl-10 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition-colors"
                                    placeholder="Search by order ID or name..." value="{{ request('search') }}">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- History List Section -->
                <div class="space-y-4" id="historyList">
                    @if (!$data->isEmpty())
                        @foreach ($data as $item)
                            <div data-modal-target="modalInformationUser"
                                class="bg-white rounded-xl shadow-sm overflow-hidden hover:shadow-md transition-all duration-200 cursor-pointer"
                                data-id="{{ $item->id }}" data-type="{{ $item->type }}" data-modal-key="showModalInformationUser">
                                <div class="flex flex-col md:flex-row md:items-center justify-between p-4 md:p-5 border-l-4
                                    {{ $item->status === 'pending' ? 'border-yellow-400' : '' }}
                                    {{ $item->status === 'process' ? 'border-blue-400' : '' }}
                                    {{ $item->status === 'completed' ? 'border-green-500' : '' }}">
                                    
                                    <div class="flex items-start gap-4">
                                        <!-- Service Icon -->
                                        <div class="hidden md:flex h-12 w-12 rounded-full bg-primary bg-opacity-10 items-center justify-center flex-shrink-0">
                                            @if($item->type === 'laundry')
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                                                </svg>
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                                </svg>
                                            @endif
                                        </div>
                                        
                                        <!-- Order Details -->
                                        <div>
                                            <div class="flex items-center gap-2">
                                                <h2 class="text-lg font-semibold text-gray-800">{{ $item->name }}</h2>
                                                <span class="text-xs font-medium uppercase px-2 py-1 rounded-full
                                                    {{ $item->type === 'laundry' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                                    {{ $item->type }}
                                                </span>
                                            </div>
                                            
                                            <div class="mt-1 text-sm text-gray-600">
                                                <div class="flex items-center gap-1 mb-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                    </svg>
                                                    <span>Submitted on {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y, h:i A') }}</span>
                                                </div>
                                                
                                                @if ($item->address_delivery)
                                                    <div class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        <span class="truncate max-w-xs">{{ $item->address_delivery }}</span>
                                                    </div>
                                                @else
                                                    <div class="flex items-center gap-1 text-gray-500 italic">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                                        </svg>
                                                        <span>No delivery address</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center justify-between md:justify-end gap-4 mt-4 md:mt-0">
                                        <!-- Status Badge -->
                                        <div>
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                {{ $item->status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $item->status === 'process' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $item->status === 'completed' ? 'bg-green-100 text-green-800' : '' }}">
                                                @if($item->status === 'pending')
                                                    <svg class="mr-1.5 h-2 w-2 text-yellow-600" fill="currentColor" viewBox="0 0 8 8">
                                                        <circle cx="4" cy="4" r="3" />
                                                    </svg>
                                                @elseif($item->status === 'process')
                                                    <svg class="mr-1.5 h-2 w-2 text-blue-600" fill="currentColor" viewBox="0 0 8 8">
                                                        <circle cx="4" cy="4" r="3" />
                                                    </svg>
                                                @else
                                                    <svg class="mr-1.5 h-2 w-2 text-green-600" fill="currentColor" viewBox="0 0 8 8">
                                                        <circle cx="4" cy="4" r="3" />
                                                    </svg>
                                                @endif
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </div>
                                        
                                        <!-- Action Buttons -->
                                        <div class="flex gap-2">
                                        
                                            <a href="{{ route('user.print', [
                                                'type' => 'laundryReceipt',
                                            ]) }}" class="bg-primary text-white p-2 rounded-lg transition-colors duration-200" target="_blank" title="Print Receipt">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Progress Indicator (for in-process items) -->
                                @if($item->status === 'process')
                                    <div class="bg-blue-50 px-5 py-2">
                                        <div class="flex items-center justify-between text-xs text-blue-700">
                                            <span>Processing</span>
                                            <span>Estimated completion: {{ \Carbon\Carbon::parse($item->estimation)->format('d M Y') }}</span>
                                        </div>
                                        <div class="w-full bg-blue-200 rounded-full h-1.5 mt-1">
                                            <div class="bg-blue-600 h-1.5 rounded-full" style="width: 45%"></div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="bg-white rounded-xl shadow-sm p-12 text-center">
                            <div class="flex flex-col items-center">
                                <div class="bg-gray-100 p-4 rounded-full mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-medium text-gray-700 mb-2">No Orders Found</h3>
                                <p class="text-gray-500 max-w-md mb-6">You don't have any service history yet. Place your first order to get started!</p>
                                <div class="flex items-center justify-center flex-col md:flex-row gap-5 md:gap-8">
                                    <a href="{{ route('laundry') }}" class="bg-primary hover:bg-[#0c7489] text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Order Laundry
                                    </a>
                                    <div class="h-full block m-auto">
                                        <p class="text-gray-500 text-lg max-w-md">Or</p>
                                    </div>
                                    <a href="{{ route('ironing') }}" class="bg-primary hover:bg-[#0c7489] text-white font-medium py-2 px-6 rounded-lg transition-colors duration-200 inline-flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                        </svg>
                                        Order Ironing
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                
                <!-- Pagination -->
                <div id="pagination-container" class="mt-8">
                    {{ $data->links('pagination.history-user-pagination') }}
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

    <!-- Modal information-->
    @include('pages.modal-information-user')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Search functionality
            const searchInput = document.getElementById('search');
            let searchTimeout;
            
            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    const searchValue = searchInput.value.trim();
                    const currentUrl = new URL(window.location.href);
                    
                    if (searchValue) {
                        currentUrl.searchParams.set('search', searchValue);
                    } else {
                        currentUrl.searchParams.delete('search');
                    }
                    
                    window.location.href = currentUrl.toString();
                }, 500);
            });
            
            // Add hover effect to history items
            const historyItems = document.querySelectorAll('#historyList > div');
            historyItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.classList.add('transform', 'scale-[1.01]');
                });
                
                item.addEventListener('mouseleave', function() {
                    this.classList.remove('transform', 'scale-[1.01]');
                });
            });
            
            // View details button functionality (if needed)
            const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
            viewDetailsButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent the parent div click event
                    // The parent div already has the modal trigger, so we don't need additional code here
                });
            });
        });
    </script>
</x-user-layout>