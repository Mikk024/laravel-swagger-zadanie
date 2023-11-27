<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pet API</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css') 
    </head>
    <body>
        <div class="px-32 py-16 bg-black text-white flex justify-around">
            <a href="{{ route('pet-show') }}">Get Pet</a>
            <a href="{{ route('pet-create') }}">Add Pet</a>
        </div>
        @yield('content')
    </body>
</html>
