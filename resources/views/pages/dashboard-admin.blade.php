<x-admin-layout>
    <div class="mb-6">
        <h1 class="text-2xl font-semibold text-gray-800">Dashboard</h1>
    </div>


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
            <img src="{{ asset('img/service-icon.svg') }}" alt="Service Icon" class="w-30 h-30 absolute top-2 left-2">
            <h1 class="text-white text-xl font-semibold">Service</h1>
            <div
                class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                <p class="text-5xl font-semibold">{{ $service }}</p>
            </div>
        </div>

        <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
            <img src="{{ asset('img/users-icon.svg') }}" alt="Users Icon" class="w-30 h-30 absolute top-2 left-2">
            <h1 class="text-white text-xl font-semibold">Users</h1>
            <div
                class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                <p class="text-5xl font-semibold">{{ $users }}</p>
            </div>
        </div>

        <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
            <img src="{{ asset('img/pending-icon.svg') }}" alt="Pending Icon" class="w-30 h-30 absolute top-2 left-2">
            <h1 class="text-white text-xl font-semibold">Pending</h1>
            <div
                class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                <p class="text-5xl font-semibold">{{ $pending }}</p>
            </div>
        </div>

        <div class="relative h-30 bg-primary rounded-md shadow-md p-3 overflow-hidden">
            <img src="{{ asset('img/complete-icon.svg') }}" alt="Complete Icon" class="w-30 h-30 absolute top-2 left-2">
            <h1 class="text-white text-xl font-semibold">Completed</h1>
            <div
                class="w-36 h-18 bg-white rounded-t-full absolute bottom-0 left-1/2 -translate-x-1/2 flex items-center justify-center">
                <p class="text-5xl font-semibold">{{ $completed }}</p>
            </div>
        </div>
    </div>


<div class="flex flex-col lg:flex-row gap-6">

    <!-- Left Column (Recent Services) -->
    <div class="w-full lg:w-2/3 flex flex-col">
        <div class="h-full flex flex-col bg-white rounded-sm shadow-lg overflow-hidden">
            <div class="bg-primary px-4 py-3">
                <h2 class="text-white text-lg font-semibold">Recent Services</h2>
            </div>

            <div class="flex-1 overflow-x-auto">
                <div class="min-w-full inline-block align-middle">
                    <div class="overflow-hidden rounded-sm">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-primary">
                                
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @if ($recentServices)
                                    @foreach ($recentServices as $service)
                                        <tr>
                                            <td class="px-6 py-4 text-sm text-primary">{{ $loop->index + 1 }}</td>
                                            <td class="px-6 py-4 text-sm font-medium text-primary">
                                                {{ $service->name_ironing ?? $service->name_laundry }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-primary">
                                                {{ \Carbon\Carbon::parse($service->created_at)->format('d-m-Y') }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-primary">
                                                {{ $service->itemType->name_item }}
                                            </td>
                                            <td class="px-6 py-4">
                                                <span @class([
                                                    'px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full',
                                                    'bg-yellow-100 text-yellow-800' => $service->status == 'pending',
                                                    'bg-blue-100 text-blue-800' => $service->status == 'process',
                                                    'bg-green-100 text-green-800' => $service->status == 'completed',
                                                ])>
                                                    {{ ucfirst($service->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                            No recent services available.
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full lg:w-1/3 flex flex-col">
        <div class="h-full flex flex-col bg-white rounded-sm shadow-lg overflow-hidden">
            <div class="bg-primary px-4 py-3">
                <h2 class="text-white text-lg font-semibold">Recent Users</h2>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                @if ($recentUsers)
                    @foreach ($recentUsers as $user)
                    <div class="flex items-center gap-4 mb-4">
                        <div class="h-8 w-8 rounded-full bg-btn flex items-center justify-center text-black font-medium uppercase">
                            {{ Str::substr(optional($user)->name, 0, 2) }}
                        </div>
                        <div>
                            <p class="text-primary font-medium">{{ $user->name ?? 'Unknown User' }}</p>
                            <p class="text-sm text-primary">New user Registered</p>
                            <p class="text-gray-500 text-xs">
                                {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                            </p>
                        </div>
                    </div>
                    
                    @endforeach
                @else
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-14 h-14 rounded-full">
                        <p class="text-primary">No Recent Users</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

</div>


    
    

    <script>
        localStorage.setItem('api_token', {{ Js::from(session('api_token')) }});
        localStorage.setItem('ref_id', {{ Js::from(session('user_id')) }});
    </script>
</x-admin-layout>
