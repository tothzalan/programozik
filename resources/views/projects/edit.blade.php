<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Edit ' . $project->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('projects.update', $project) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 grid-cols-5 grid-rows-3 dark:text-gray-100">
                            @include('projects.partials.form_name', ['value' => $project->name])

                            @include('projects.partials.form_description', [
                                'value' => $project->description,
                            ])

                            @include('projects.partials.form_link', ['value' => $project->link])
                        </div>

                        <div>
                            <button type="submit" class="bg-green-400 rounded-full p-3 m-4 mb-0">
                                Save project
                            </button>
                            <button>
                                <a href="/projects" class="bg-yellow-300 rounded-full p-3 mb-0">Go back</a>
                            </button>
                        </div>
                    </form>
                    <hr class="mt-2">
                    <h2 class="font-bold text-xl">Posts</h2>

                    <form action="{{ route('projects.posts.add', $project) }}" method="post">
                        @csrf
                        <div class="grid gap-6 grid-cols-5">
                            <input type="text" name="title" placeholder="Title" class="border p-2 col-span-3"
                                value="{{ old('title') }}">
                            <div class="col-span-2"></div>

                            <textarea name="content" placeholder="Content" class="border p-2 col-span-2" cols="30" rows="10">{{ old('content') }}</textarea>
                        </div>

                        <div>
                            <input type="hidden" name="user_id" value="{{ $project->owner->id }}">
                            <button type="submit" class="bg-green-400 rounded-full p-3 m-4">
                                Add post
                            </button>
                        </div>
                    </form>
                    @if (count($project->posts) > 0)
                        @foreach ($project->posts as $post)
                            <div class="border text-left p-2">
                                <div class="font-bold">{{ $post->title }}</div>
                                <div>{{ $post->content }}</div>
                                <form action="{{ route('projects.posts.remove', [$project, $post]) }}"
                                method="post">
                                @csrf
                                @method('DELETE')
                                {{-- hidden post id --}}
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <button class="bg-red-400 rounded-full p-3 m-4 mb-0" type="submit">
                                    Delete post
                                </button>
                            </form>
                            </div>
                        @endforeach
                    @else
                        <h2 class="font-bold text-xl mb-6 mt-1">No posts yet</h2>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
