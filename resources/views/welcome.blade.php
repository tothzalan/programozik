<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BitBounty</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite('resources/css/app.css')

</head>

<body class="antialiased">
    <div class="">
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div>
            <div class="flex justify-center">
                <h1 class="text-3xl font-bold pt-10 dark:text-gray-100">Browse projects</h1>
            </div>
            <div class="max-w-xl mx-auto">
                <ul class="mt-12">
                    @foreach ($projects as $project)
                        <li>
                            <p class="mt-4 text-center"><a class="text-xl dark:text-gray-100"
                                    href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a></p>
                        </li>
                        <li>
                            <p class="text-center text-xs dark:text-gray-100"><a
                                    href="{{ route('projects.show', $project->id) }}">{{ substr($project->description, 0, 80) }}{{ strlen($project->description) > 80 ? '...' : '' }}</a>
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</body>

</html>
