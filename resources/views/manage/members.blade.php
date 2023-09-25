<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Manage members') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900  dark:text-gray-100">
                    <div>
                        <b class="text-xl mb-4">Owner:</b><a href="{{ route('user.show', $owner->name) }}" class="text-blue-600 ml-2 dark:text-blue-300">{{ $owner->name }}</a>
                    </div>
                    <div>
                    <b class="text-xl">Accepted users:</b>
                    @foreach($members as $member)
                        <div class="grid grid-cols-5">
                            @if($member->valid)
                            <div class="col-span-3 p-2">
                                <a href="{{ route('user.show', $member->user->name) }}" class="m-2">{{ $member->user->name }}</a>
                            </div>
                                @if(Auth::user() == $owner)
                                <div class="col-span-2">
                                    <form method="POST" action="{{ route('members.deny', $member) }}">
                                        @csrf
                                        <button class="font-bold bg-red-500 rounded-full p-3 dark:text-gray-800 dark:bg-red-500" type="submit">Remove</button>
                                    </form>
                                </div>
                                @else
                                <div class="col-span-2">
                                    <form method="POST" action="{{ route('members.leave', $member) }}">
                                        @csrf
                                        <button class="font-bold bg-red-500 rounded-full p-3 dark:text-gray-800 dark:bg-red-500" type="submit">Leave project</button>
                                    </form>
                                </div>
                                @endif
                            @endif
                        </div>
                    @endforeach
                    </div>
                    @if(Auth::user() == $owner)
                    <div>
                    <b class="text-xl">Pending users:</b>
                    @foreach($members as $member)
                        <div class="grid grid-cols-5">
                            @if(!$member->valid)
                            <div class="col-span-3">
                                <p class="p-2">{{ $member->user->name }}</p>
                            </div>
                            <div class="col-span-1 p-3">
                                <form method="POST" action="{{ route('members.accept', $member) }}">
                                    @csrf
                                    <button class="font-bold bg-green-300 rounded-full p-3 dark:text-gray-800" type="submit">Accept</button>
                                </form>
                            </div>
                            <div class="col-span-1 p-3">
                                <form method="POST" action="{{ route('members.deny', $member) }}">
                                    @csrf
                                    <button class="font-bold bg-yellow-300 rounded-full p-3 dark:text-gray-800 dark:bg-yellow-500">Deny</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    @endforeach            
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
