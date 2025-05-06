<!-- Modal -->
<div id="modalInformationUser"
    class="modal fixed inset-0 hidden flex items-center justify-center z-50 transition-opacity duration-300 opacity-0 bg-black/30">

    <div
        class="modal-content bg-white rounded-lg w-full max-w-lg md:max-w-2xl mx-4 shadow-lg transform scale-95 transition-transform duration-300 max-h-[90vh] flex flex-col overflow-hidden md:scale-90">

        <!-- Header with gradient background -->
        <x-modal-header title="Laundry #22872"></x-modal-header>

        <div class="modal-data w-full flex flex-col overflow-hidden">

            <!-- Scrollable content area -->
            <div class="overflow-y-auto p-6 space-y-5 flex-1">
                <!-- Item Details Section (New) -->
                <div
                    class="bg-white rounded-lg p-4 pb-0 border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-200 mb-6">
                    <div class="flex items-center gap-3 mb-1 border-b border-gray-200 pb-2">
                        <div class="flex justify-between items-center w-full">
                            <div class="flex justify-center items-center gap-4">
                                <div
                                    class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4a2 2 0 0 0 1-1.73z" />
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M3.27 6.96l8.73 5.02 8.73-5.02M12 22V12" />
                                    </svg>
                                </div>
                                <label class="text-sm font-semibold text-gray-700 transition-colors">Items
                                    Details</label>
                            </div>

                            <div class="flex justify-center items-center gap-2">
                                <div class="cursor-pointer bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors"
                                    id="prev">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M19 12H5M11 19l-7-7 7-7" />
                                    </svg>

                                </div>
                                <div class="cursor-pointer bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors"
                                    id="next">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path d="M5 12h14M13 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="items-details flex gap-8 p-3 overflow-x-auto scrollbar-hide" id="slider">
                        <!-- Item Card -->
                        <div
                            class="item-card flex flex-col justify-center items-center md:flex-row gap-4 min-w-[95%] md:min-w-[500px]">
                            <!-- Item Image -->
                            <div class="w-full md:w-1/3 flex justify-center">
                                <div
                                    class="relative w-40 h-w-40 rounded-lg overflow-hidden border border-gray-200 shadow-sm">
                                    <img src="{{ asset('img/bedding.png') }}" alt="Laundry Item"
                                        class="w-full h-full object-cover">
                                </div>
                            </div>

                            <!-- Item Info -->
                            <div class="w-full space-y-3 pb-0">
                                <div>
                                    <h4 class="text-lg font-medium text-gray-800">Regular Wash & Fold</h4>
                                    <p class="text-sm text-gray-600">Service ID: WF-12345</p>
                                </div>

                                <div class="grid grid-cols-2 gap-2">
                                    <div class="bg-white p-2 rounded-lg border border-gray-300">
                                        <span class="text-xs text-gray-500">Price</span>
                                        <p class="font-semibold text-sm text-gray-800">Rp. 5.000,00</p>
                                    </div>
                                    <div class="bg-white p-2 rounded-lg border border-gray-300">
                                        <span class="text-xs text-gray-500">Quantity</span>
                                        <p class="font-semibold text-sm text-gray-800">12 pcs</p>
                                    </div>
                                    <div class="bg-white p-2 rounded-lg border border-gray-300 col-span-2">
                                        <span class="text-xs text-gray-500">Total</span>
                                        <p class="font-semibold text-sm text-gray-800">Rp. 100.000,00</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Amount Item -->
                <div class="flex flex-col gap-4">
                    <div
                        class="group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                        <div class="flex items-center gap-3 mb-1">
                            <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path
                                        d="M20 5H8.5L7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1z" />
                                    <circle cx="10" cy="13" r="3" />
                                </svg>
                            </div>
                            <label class="text-sm font-semibold text-gray-700 transition-colors">Amount
                                Item:</label>
                        </div>
                        <div class="amount-item ml-10 text-gray-800 font-medium">12Pcs (Rp. 100.000,00)</div>
                    </div>
                    <p class="delivery-note flex text-xs text-gray-500 mt-0.5 mb-2 ml-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-green-500" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v4" />
                            <path d="M12 16h.01" />
                        </svg>
                        <span class="text-gray-600 font-medium">Note:</span>
                        <span class="ml-1 text-gray-500">If the retrieval method is <span
                                class="text-primary font-semibold">"Delivery"</span>, the total price already includes
                            the delivery fee and a <span class="text-primary font-semibold">10% tax</span>.</span>
                    </p>
                </div>


                <!-- Retrieval Method -->
                <div
                    class="group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="1" y="3" width="15" height="13" rx="2" ry="2" />
                                <circle cx="16" cy="16" r="6" />
                                <path d="M16 14v4" />
                                <path d="M14 16h4" />
                            </svg>
                        </div>
                        <label class="text-sm font-semibold text-gray-700 transition-colors">Retrieval
                            Method:</label>
                    </div>
                    <div class="retrieval-method ml-10 text-gray-800 font-medium">Delivery</div>
                </div>

                <!-- Address -->
                <div
                    class="address-container group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <label class="text-sm font-semibold text-gray-700 transition-colors">Address:</label>
                    </div>
                    <div class="address ml-10 text-gray-800 font-medium">Jln. Tibungsari 31 kuanji, Dalung</div>
                </div>

                <!-- Destination -->
                <div
                    class="destination-container group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg>
                        </div>
                        <label class="text-sm font-semibold text-gray-700 transition-colors">Destination:</label>
                    </div>
                    <div class="destination ml-10 text-gray-800 font-medium">Jln. Tibungsari 31 kuanji, Dalung</div>
                </div>

                <!-- Notes -->
                <div
                    class="group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                                <polyline points="14 2 14 8 20 8" />
                                <line x1="16" y1="13" x2="8" y2="13" />
                                <line x1="16" y1="17" x2="8" y2="17" />
                                <polyline points="10 9 9 9 8 9" />
                            </svg>
                        </div>
                        <label class="text-sm font-semibold text-gray-700 transition-colors">Notes:</label>
                    </div>
                    <div class="notes ml-10 text-gray-500 italic">Nothing</div>
                </div>

                <!-- Estimation -->
                <div
                    class="group hover:shadow-xl transition-all duration-200 rounded-lg p-4 border border-gray-100 shadow-sm">
                    <div class="flex items-center gap-3 mb-1">
                        <div class="bg-primary p-2 rounded-full text-white group-hover:shadow-xl transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <polyline points="12 6 12 12 16 14" />
                            </svg>
                        </div>
                        <label class="text-sm font-semibold text-gray-700 transition-colors">Estimation:</label>
                    </div>
                    <div class="ml-10">
                        <span
                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-primary text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <rect x="2" y="4" width="20" height="16" rx="2" />
                                <path d="M12 16v.01" />
                                <path d="M8 12h8" />
                                <path d="M8 8h8" />
                            </svg>
                            <span class="estimation">Null Pay First</span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Fixed Footer with action buttons -->
            <div class="action-buttons p-5 space-y-3 bg-gray-50 border-t border-gray-100">
                <a href="{{ route('complete-transaction', ['slug' => Str::slug('ironing-uu58bb')]) }}"
                    class="w-full bg-primary hover:bg-primary-dark rounded-lg cursor-pointer text-white py-3 px-6 font-bold text-lg shadow-lg transition-all duration-300 hover:shadow-xl hover:-translate-y-1 relative overflow-hidden focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="2" y="4" width="20" height="16" rx="2" />
                        <path d="M12 16v.01" />
                        <path d="M8 12h8" />
                        <path d="M8 8h8" />
                    </svg>
                    Complete Transaction
                </a>
                <button data-modal-target="modalCancelService" data-fetch="false"
                    class="cursor-pointer flex justify-center items-center w-full px-4 py-3 rounded-lg bg-white border border-red-200 text-red-600 font-medium shadow-sm hover:bg-red-100 hover:border-red-300 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="15" y1="9" x2="9" y2="15" />
                        <line x1="9" y1="9" x2="15" y2="15" />
                    </svg>
                    Cancel Order
                </button>
            </div>
        </div>
    </div>
</div>
<script>
    
    let additionalWitdh = 30;
    if (window.innerWidth >= 768) {
        additionalWitdh = 80;
    }

    //  For slider in Item Details
    document.addEventListener('click', (event) => {
        const slider = document.getElementById('slider');
        const item = document.querySelector('.item-card').getBoundingClientRect().width + additionalWitdh;

        function updateSlide(type, slide, item) {
            if (type === "next") {
                let newScroll = slide.scrollLeft + item;
                slide.scrollTo({
                    left: Math.round(newScroll),
                    behavior: "smooth"
                });
            }

            if (type === "prev") {
                let newScroll = slide.scrollLeft - item;
                slide.scrollTo({
                    left: Math.round(newScroll),
                    behavior: "smooth"
                });
            }
        }

        const target = event.target.closest('#prev, #next');
        if (target) {
            if (target.id === 'prev') {
                updateSlide("prev", slider, item);
            } else if (target.id === 'next') {
                updateSlide("next", slider, item);
            }
        }
    });
</script>

@include('pages.modal-cancel-service')
