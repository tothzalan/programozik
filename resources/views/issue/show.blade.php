<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-100">
            {{ __($issue->name) }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg dark:bg-gray-600">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <b class="text-xl">Issue name:</b> {{ $issue->name }} <br>
                    <b class="text-xl">Issue description:</b> {{ $issue->description }} <br>
                    <b class="text-xl">Issue url:</b> <a target="_blank" href="{{ $issue->url }}">{{ $issue->url }}</a> <br>
                    <b class="text-xl">Price:</b> {{ $issue->price }}$
                </div>
                <div>
                    <button class="font-bold bg-yellow-300 rounded-full p-3 dark:text-gray-800 dark:bg-yellow-500 m-4">
                        <a href="/projects">Go back</a>
                    </button>
                </div>
            </div>
        </div>
</x-app-layout>
