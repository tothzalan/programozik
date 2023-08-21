<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit ' . $project->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <form action="{{ route('projects.update', $project) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="grid gap-6 grid-cols-5 grid-rows-3">
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
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
