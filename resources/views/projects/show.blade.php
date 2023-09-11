<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __($project->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <b class="text-xl">Project name:</b> {{ $project->name }} <br>
                    <b class="text-xl">Author:</b><a href="{{ route('user.show', $project->owner->name) }}"
                        class="text-blue-600 ml-2 dark:text-blue-300">{{ $project->owner->name }}</a> <br>
                    <b class="text-xl">Description:</b> {!! $project->description !!} <br>
                    <b class="text-xl">Link:</b> <a
                        href="{{ str_contains($project->link, '//') ? $project->link : '//' . $project->link }}">{{ $project->link }}</a>
                    @auth
                        <div class="grid grid-cols-12">
                            <div class="col-span-10">
                                @if (isset($owner))
                                    @if ($owner)
                                        <div class="mt-6">
                                            <a class="font-bold bg-green-300 rounded-full p-3 mb-4 dark:text-gray-800"
                                                href="{{ route('members.manage', $project->id) }}">Manage members</a>
                                        </div>
                                    @else
                                        @if (!$pending)
                                            <form method="POST" action="{{ route('projects.join', $project->id) }}">
                                                @csrf
                                                <button type="submit" class="mt-6">
                                                    <a class="font-bold bg-green-300 rounded-full p-3 dark:text-gray-800">Join
                                                        project</a>
                                                </button>
                                            </form>
                                        @endif
                                    @endif
                                @endif
                                @if ($member && !$owner)
                                    <div class="p-3 mt-2 ml-0">
                                        <a class="font-bold bg-green-300 rounded-full p-3 dark:text-gray-800"
                                            href="{{ route('members.manage', $project->id) }}">View members</a>
                                    </div>
                                @elseif($pending)
                                    <div class="p-3">
                                        <button
                                            class="font-bold bg-green-300 rounded-full p-2 disabled opacity-50 dark:text-gray-800"
                                            disabled>Join pending</button>
                                    </div>
                                @endif
                            </div>
                            <div class="pb-5 col-span-2">
                                <button class="mt-6">
                                    <a class="font-bold bg-yellow-300 rounded-full p-3 dark:text-gray-800 dark:bg-yellow-500"
                                        href="/projects">Go back</a>
                                </button>
                            </div>
                        </div>
                    @endauth
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <h2 class="font-bold text-xl mt-2 mb-2">Posts</h2>
                    @if (count($project->posts) > 0)
                        @foreach ($project->posts as $post)
                            <div class="border text-left p-2 mb-4 dark:border-0">
                                <div class="font-bold">{{ $post->title }}</div>
                                <div>{{ $post->content }}</div><br />
                                <div>{{ count($post->upvotes) }} upvotes</div>
                                {{-- create upvote button --}}
                                @auth
                                    @if ($post->upvotes->contains('user_id', Auth::user()->id))
                                        <form method="POST"
                                            action="{{ route('upvotes.destroy', ['post_id' => $post->id, 'user_id' => Auth::id()]) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="mt-6">
                                                <a class="font-bold bg-red-300 rounded-full p-3 dark:text-gray-800">Remove
                                                    upvote</a>
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('upvotes.store') }}">
                                            @csrf
                                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                                            <button type="submit" class="mt-6">
                                                <a
                                                    class="font-bold bg-green-300 rounded-full p-3 dark:text-gray-800">Upvote</a>
                                            </button>
                                        </form>
                                    @endif
                                @endauth
                            </div>
                        @endforeach
                    @else
                        <h2 class="mb-6 mt-1">No posts yet.</h2>
                    @endif
                    <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
                    <h2 class="font-bold text-xl mt-2">Comments</h2><br>
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
                        </form>
                    @else
                        <h2 class="font-bold text-xl text-center">
                            <a href="{{ route('login') }}" class="text-blue-500">Log in</a> to comment
                        </h2>
                    @endauth

                    @if (count($project->comments) > 0)
                        @foreach ($project->comments as $comment)
                            <div class="border text-left p-2">
                                <a class="font-bold" href="{{ route('user.show', $comment->user->name) }}"
                                    class="text-blue-500">{{ $comment->user->name }}</a>
                                <div>{{ $comment->body }}</div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
</x-app-layout>
