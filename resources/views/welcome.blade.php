<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->


    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles


</head>

<body class="antialiased" style="background-color:antiquewhite">
    <div class="mt-2 container mx-auto p-4">
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="mt-4 w-full h-full grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
            @foreach ($posts as $item)
                <article class="w-full h-80 @if ($loop->first) lg:col-span-2 @endif"
                    style="background-image:url({{ Storage::url($item->imagen)}}); background-repeat: no-repeat; background-size:cover;">
                    <div class="flex flex-col justify-center w-full h-full">
                        <div>
                            <h1 class="w-3/4 px-2 text-2xl text-teal-800 font-bold py-2 rounded-xl bg-gray-200
                            opacity-50">{{ $item->titulo }}</h1>
                        </div>
                        <div class="mt-4">
                            <span class="w-1/2 mt-2 italic text-red-700 items-center px-1 py-1 rounded-xl
                            opacity-50 bg-gray-200">({{ $item->user->email }}</span>)
                        </div>
                    </div>
                </article>
            @endforeach()
            
        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>
</body>

</html>
