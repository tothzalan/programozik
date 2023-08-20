<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($project->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <b>Project name:</b> {{ $project->name }} <br>
                    <b>Description:</b> {!! $project->description !!} <br>
                    <b>Link:</b> <a
                        href="{{ str_contains($project->link, '//') ? $project->link : '//' . $project->link }}">{{ $project->link }}</a>
                    @auth
                        <div>
                            <button>
                                <a href="/projects">Go back</a>
                            </button>
                        </div>
                    @endauth

                    {{-- comment section --}}
                    <div class="mt-10">
                        <h3 class="text-lg font-semibold">Comments</h3>
                        <form action="/projects/{{ $project->id }}/comments" method="POST">
                            @csrf
                            <div class="mt-4">
                                <textarea name="body" class="w-full border-gray-300 rounded-md" rows="4" placeholder="Add a comment..."></textarea>
                            </div>
                            <div class="flex justify-end mt-4">
                                <button type="submit"
                                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Post</button>
                            </div>
                        </form>
                    </div>
                    {{-- TODO: show comments --}}
                </div>
            </div>
        </div>
</x-app-layout>
