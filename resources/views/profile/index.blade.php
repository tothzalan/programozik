<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __($user->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg dark:bg-gray-600 dark:text-gray-100">
                <div>
                    <div>
                        <b>Email:</b> {{ $user->email }}
                    </div>
                    @if($user->discord != null)
                    <div>
                        <b>Discord</b> {{ $user->discord }}
                    </div>
                    @endif
                    @if($user->github != null)
                    <div>
                        <b>GitHub</b> <a href="https://github.com/{{$user->github}}" class="text-blue-600 dark:text-blue-300">{{ $user->github }}</a>
                    </div>
                    @endif
                </div>
                <div>
                    <h2 class="text-xl font-bold my-4">Projects:</h2>
                    @foreach($projects as $proj)
                        <a href="{{ route('projects.show', $proj->id) }}" class="text-blue-600 ml-4 dark:text-blue-300">{{ $proj->name }}</a><br>
                    @endforeach
                </div>
                <div>
                    <h2 class="text-xl font-bold my-4">Contributed:</h2>
                    @foreach ($members as $member)
                        <a href="{{ route('projects.show', $member->project->id) }}" class="text-blue-600 ml-4 dark:text-blue-300">{{ $member->project->name }}</a><br>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
