<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My projects') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(count($projects) > 0)
                        @foreach($projects as $proj)
                        <div class="flex justify-between">
                            <h3>{{$proj->name}}</h3>
                             <a href="{{ route('projects.edit', $proj ) }}" class="bg-yellow-300 rounded-full p-3">
                                 EDIT
                             </a>
                            <form action="{{ route('projects.destroy', $proj) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 rounded-full p-3">
                                    DELETE
                                </button>
                            </form>
                        </div>
                        @endforeach
                        <div>
                            <a class="text-blue-400" href="/projects/create">Create a new project</a>
                        </div>
                    @else
                        You don't have any projects yet.
                        <br>
                        Please create one <a class="text-blue-400" href="/projects/create">here</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
