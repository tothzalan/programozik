<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Browse projects') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <ul>
                @if(count($projects) > 0)
                @foreach ($projects as $project)
                    <li><p><a href="{{ route('projects.show', $project->id) }}">{{$project->name}}</a></p></li>
                @endforeach
                @else
                    <p>There are currently no project which are not yours!</p>
                @endif
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
