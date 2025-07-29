<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite('resources/css/app.css')
        
    </head>
    <body>
        <header class="bg-gray-900 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
            <!-- Logo / Title -->
                <h1 class="text-2xl font-bold">
                    <a href="{{ url('/') }}" class="hover:text-gray-300">The Pantry</a>
                </h1>

            <!-- Navigation -->
                <nav class="space-x-6">
                    <a href="{{ url('/') }}" class="hover:text-gray-300 transition">Home</a>
                    <a href="{{ url('/about') }}" class="hover:text-gray-300 transition">About</a>
                    <a href="{{ url('/contact') }}" class="hover:text-gray-300 transition">Contact</a>
                    <a href="{{ url('/blog') }}" class="hover:text-gray-300 transition">Blog</a>
                    <a href="{{ url('/trial') }}" class="hover:text-gray-300 transition">Trial</a>
                </nav>
            </div>
        </header>

        <section class="bg-gray-100 min-h-screen flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-3xl font-bold underline text-red-500">
                    Welcome to the Trial Page!
                </h1>
                <p class="mt-4 text-lg">This is a simple Laravel trial page.</p>
            </div>
        </section>

        <h1 class="text-3xl font-bold underline text-red-500">
        Hello world!
        </h1>
    </body>
</html>
