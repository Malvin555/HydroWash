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


    <div class="grid grid-cols-1 lg:grid-cols-3 gap-3">
        <div class="bg-primary px-2 rounded-sm shadow-md mb-6 col-span-2">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y bg-primary divide-gray-200 rounded-sm">
                    <thead class="bg-primary">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                Status</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-primary">

                        @if ($recentServices)
                            @foreach ($recentServices as $service)
                                <tr onclick="window.location.href='{{ route('laundry-admin') }}'"
                                    class="cursor-pointer hover:bg-gray-100">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-primary">{{ $loop->index + 1 }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <p class="text-sm font-medium text-primary">
                                                {{ $service->name_ironing ?? $service->name_laundry }}</p>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-primary">
                                        {{ \Carbon\Carbon::parse($service->created_at)->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-primary">
                                        {{ $service->itemType->name_item }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
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
            <div class="px-6 py-3 bg-primary border-t border-gray-200 text-left">
                <p class="text-sm font-medium text-white/50">Recent Services</p>
            </div>
        </div>

        <div class="col-span-1">
            <div class="bg-primary w-full rounded-t-sm px-5 py-2">
                <h1 class="text-white text-xl">Recent Users</h1>
            </div>
            <div class="border border-primary rounded-b-sm w-full px-5 py-3">

                @if ($recentUsers)
                    @foreach ($recentUsers as $user)
                        <div class="w-full flex items-center gap-2 mb-3">
                            <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-15 h-15">
                            <div>
                                <h1 class="text-primary">{{ $user->name }}</h1>
                                <p class="text-primary text-sm">New user a Registered</p>
                                <p class="text-gray-500 text-[.8rem]">
                                    {{ \Carbon\Carbon::parse($user->created_at)->diffForHumans() }}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="w-full flex items-center gap-2 mb-3">
                        <img src="{{ asset('img/profile-img.png') }}" alt="profile" class="w-15 h-15">
                        <div>
                            <h1 class="text-primary">No Recent Users</h1>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <script>
        localStorage.setItem('api_token', {{ Js::from(session('api_token')) }});
        localStorage.setItem('ref_id', {{ Js::from(session('user_id')) }});
    </script>
</x-admin-layout>
