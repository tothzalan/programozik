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
                    <b class="text-xl">Project name:</b> {{ $project->name }} <br>
                    <b class="text-xl">Description:</b> {!! $project->description !!} <br>
                    <b class="text-xl">Link:</b> <a
                        href="{{ str_contains($project->link, '//') ? $project->link : '//' . $project->link }}">{{ $project->link }}</a>
                    @auth
                        <div class="pb-5">
                            <button class="mt-6">
                                <a class="bg-yellow-300 rounded-full p-3" href="/projects">Go back</a>
                            </button>
                        </div>
                    @endauth
                    <hr>

                    </form>
                    <h2 class="font-bold text-xl">Comments</h2><br>
                    {{-- comment section --}}
                    @auth
                    <h2 class="font-bold text-xl">Add comment</h2>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control " name="body"></textarea>
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                        </div>
                        <div class="form-group">
                            <input type="submit"
                                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                                value="Add Comment" />
                        </div><br>
                        <hr>
                    @else
                        <h2 class="font-bold text-xl text-center">
                            <a href="{{ route('login') }}" class="text-blue-500">Log in</a> to comment
                        </h2>
                    @endauth

                    @if(count($project->comments) > 0)
                        {{-- TODO: show comments in the right order --}}
                        @foreach ($project->comments as $comment)
                            <div class="border text-left p-2">
                                <div class="font-bold">{{ $comment->user->name }}</div>
                                <div>{{ $comment->body }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>
