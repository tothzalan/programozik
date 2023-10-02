<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __('Create issue') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="/issues/{{ $project_id }}/store" method="post">
                        @csrf
                        <div class="grid gap-6 grid-cols-5 grid-rows-3">
                            @include('issue.partials.form_name')
                            @include('issue.partials.form_description')
                            @include('issue.partials.form_price')
                            @include('issue.partials.form_url')
                        </div>
                        <div>
                            <button type="submit" value="Create project" class="font-bold bg-green-300 rounded-full p-3 dark:text-gray-800 p-3 m-4 mb-0">
                                Create issue
                            </button>
                            <button class="font-bold bg-yellow-300 rounded-full p-3 dark:text-gray-800 dark:bg-yellow-500 mb-0">
                                <a href="/projects">Go back</a>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
