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
                    <br>
                    <hr>

                    {{-- comment section --}}
                    <br>
                    <h3>Add comment</h3>
                    <form method="post" action="{{ route('comments.store') }}">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="body"></textarea>
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Add Comment" />
                        </div>
                    </form>
                    {{-- TODO: show comments --}}
                    @foreach ($project->comments as $comment)
                        <div>{{ $comment->body }} {{$comment->user_id}}</div>
                    @endforeach
                </div>
            </div>
        </div>
</x-app-layout>
