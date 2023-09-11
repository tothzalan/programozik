<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Create project') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/projects/create" method="post">
                        @csrf
                        <div class="grid gap-6 grid-cols-5 grid-rows-3">
                            @include('projects.partials.form_name')

                            @include('projects.partials.form_description')

                            @include('projects.partials.form_link')
                        </div>
                        <div>
                            <button type="submit" value="Create project" class="bg-green-400 rounded-full p-3 m-4 mb-0">
                                Create project
                            </button>
                            <button class="bg-yellow-300 rounded-full p-3 mb-0">
                                <a href="/projects">Go back</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
