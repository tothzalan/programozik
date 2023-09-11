<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-100 leading-tight">
            {{ __('My projects') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (count($projects) > 0)
                        @foreach ($projects as $proj)
                            <div class="flex justify-between mb-2 mt-2">
                                <h3>
                                    <a href="{{ route('projects.show', $proj) }}">
                                        {{ $proj->name }}
                                    </a>
                                </h3>
                                <div class="flex">
                                    <a href="{{ route('projects.edit', $proj) }}"
                                        class="font-bold bg-yellow-300 rounded-full p-3 mr-3 dark:text-gray-800 dark:bg-yellow-500">
                                        EDIT
                                    </a>
                                    <form action="{{ route('projects.destroy', $proj) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-bold bg-red-500 rounded-full p-3 dark:text-gray-800 dark:bg-red-600">
                                            DELETE
                                        </button>
                                    </form>
                                </div>
                            </div><hr>
                        @endforeach
                        <div>
                            <a class="text-blue-400 dark:text-blue-300" href="/projects/create">Create a new project</a>
                        </div>
                    @else
                        <p class="dark:text-gray-100">You don't have any projects yet.</p>
                        <br>
                        Please create one <a class="text-blue-400" href="/projects/create">here</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
