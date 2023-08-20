<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <h1 class="text-3xl font-bold pt-10">Browse projects</h1>
            </div>
            <div class="max-w-xl mx-auto">
                <ul>
                @foreach ($projects as $project)
                    <li><p><a href="{{ route('projects.show', $project->id) }}">{{$project->name}}</a></p></li>
                @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
