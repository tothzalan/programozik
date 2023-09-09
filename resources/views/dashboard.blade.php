<x-app-layout>
    <x-slot name="header">
        <h2 class="dark:text-gray-100 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <ul>
                    @if (count($projects) > 0)
                        @foreach ($projects as $project)
                            <div class="border bg-white mb-4 dark:bg-gray-600 dark:border-black">
                                <li>
                                    <p class="font-bold text-xl ml-4 mt-4 dark:text-gray-100"><a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></p>
                                </li>
                                <p class="mb-4 ml-12 mt-1 dark:text-gray-100">
                                    by <a href="{{ route('user.show', $project->owner->name)}}" class="text-blue-500 dark:text-blue-300">{{ $project->owner->name }}</a>
                                </p>
                            </div>
                        @endforeach
                    @else
                        <p>There are currently no project which are not yours!</p>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
