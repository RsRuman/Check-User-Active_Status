<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="bg-green-900 font-medium font-serif p-2 rounded text-2xl text-center text-white">
                        <h1>User Lists</h1>
                    </div>

                    <div class="border-2 font-serif inline-flex justify-evenly mt-2 py-2 w-full">
                        <p class="border-2 w-1/6 text-center">No.</p>
                        <p class="border-2 w-1/6 text-center">User Name</p>
                        <p class="border-2 w-1/6 text-center">User Email</p>
                        <p class="border-2 w-1/6 text-center">Last Seen</p>
                        <p class="border-2 w-1/6 text-center">Status</p>
                    </div>

                    @foreach($users as $user)
                    <div class="border-2 font-serif inline-flex justify-evenly mt-2 py-2 w-full">
                        <p class="border-2 w-1/6 text-center">{{ $loop->iteration }}</p>
                        <p class="border-2 w-1/6 text-center">{{ $user->name }}</p>
                        <p class="border-2 w-1/6 text-center">{{ $user->email }}</p>
                        <p class="border-2 w-1/6 text-center">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</p>

                        @if(Cache::has('userIsOnline'.$user->id))
                            <p class="border-2 w-1/6 text-center text-green-500">Online</p>
                        @else
                            <p class="border-2 w-1/6 text-center">Offline</p>
                        @endif

                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
