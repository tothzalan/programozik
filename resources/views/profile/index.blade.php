<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div>
                    <b>Email:</b> {{ $user->email }}
                </div>
                <div>
                    <h2 class="text-xl font-bold my-4">Projects:</h2>
                    @foreach($projects as $proj)
                        <a href="{{ route('projects.show', $proj->id) }}" class="text-blue-600 ml-4">{{ $proj->name }}</a><br>
                    @endforeach
                </div>
                <div>
                    <h2 class="text-xl font-bold my-4">Contributed:</h2>
                    {{-- TODO: show joined projects --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
