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
                    <b class="text-xl">Author:</b><a href="{{ route('user.show', $project->owner->name) }}" class="text-blue-600 ml-2">{{ $project->owner->name }}</a> <br>
                    <b class="text-xl">Description:</b> {!! $project->description !!} <br>
                    <b class="text-xl">Link:</b> <a
                        href="{{ str_contains($project->link, '//') ? $project->link : '//' . $project->link }}">{{ $project->link }}</a>
                    @auth
                        <div class="grid grid-cols-12">
                            <div class="col-span-10">
                                @if(isset($owner))
                                    @if($owner)
                                    <div class="mt-6">
                                        <a class="bg-green-300 rounded-full p-3 mb-4" href="{{ route('members.manage', $project->id) }}">Manage members</a>
                                    </div>
                                    @else
                                        @if(!$pending)
                                        <form method="POST" action="{{ route('projects.join', $project->id) }}">
                                            @csrf
                                            <button type="submit" class="mt-6">
                                                <a class="bg-green-300 rounded-full p-3">Join project</a>
                                            </button>
                                        </form>
                                        @endif
                                    @endif
                                @endif
                                @if($member && !$owner)
                                    <div class="p-3 mt-2 ml-0">
                                        <a class="bg-green-300 rounded-full p-3" href="{{ route('members.manage', $project->id)}}">View members</a>
                                    </div>
                                @elseif($pending)
                                    <div class="p-3">
                                        <button class="bg-green-300 rounded-full p-2 disabled opacity-50" disabled>Join pending</button>
                                    </div>
                                @endif
                            </div>
                            <div class="pb-5 col-span-2">
                                <button class="mt-6">
                                    <a class="bg-yellow-300 rounded-full p-3" href="/projects">Go back</a>
                                </button>
                            </div>
                        </div>
                    @endauth
                    <hr>

                    </form>
                    <h2 class="font-bold text-xl mt-2 mb-2">Posts</h2>
                    @if (count($project->posts) > 0)
                        @foreach ($project->posts as $post)
                            <div class="border text-left p-2 mb-4">
                                <div class="font-bold">{{ $post->title }}</div>
                                <div>{{ $post->content }}</div>
                            </div>
                        @endforeach
                    @else
                        <h2 class="mb-6 mt-1">No posts yet</h2>
                    @endif
                    <hr>
                    <h2 class="font-bold text-xl">Comments</h2><br>
                    {{-- comment section --}}
                    {{-- TODO: add comment by pressing enter --}}
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

                        @if (count($project->comments) > 0)
                            @foreach ($project->comments as $comment)
                                <div class="border text-left p-2">
                                    <a class="font-bold" href="{{ route('user.show', $comment->user->name)}}" class="text-blue-500">{{ $comment->user->name }}</a>
                                    <div>{{ $comment->body }}</div>
                                </div>
                            @endforeach
                        @endif
                </div>
            </div>
        </div>
</x-app-layout>
