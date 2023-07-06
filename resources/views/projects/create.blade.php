<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create project') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="/projects/create" method="post">
                        @csrf
                        <div>
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" required maxlength="255" placeholder="Name of the project">
                            @error('name')
                            <div class="tex-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="description">Description</label>
                            <textarea id="description" name="description"></textarea>
                        </div>
                        <div>
                            <label for="link">Link</label>
                            <input type="text" id="link" name="link" placeholder="https://example.com/project">
                        </div>
                        <div>
                            <button
                                type="submit" value="Create project">
                                Create project
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
