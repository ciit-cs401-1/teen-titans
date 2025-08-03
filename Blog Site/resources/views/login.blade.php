<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Pantry</title>
        <!-- Fonts -->
        @vite('resources/css/app.css')
        
    </head>
    <body>
        <header class="bg-[#af7051] text-white p-5 font-display">
            <div class="w-full px-55 flex justify-between items-center">
            <!-- Logo / Title -->
                <h1 class="text-4xl font-bold">
                    <a href="{{ url('/') }}" class="hover:text-gray-300">The Pantry</a>
                </h1>

            <!-- Navigation -->
                <nav class="space-x-15 font-display text-3xl font-semibold">
                    <a href="{{ url('/') }}" class="hover:text-gray-300 transition">Home</a>
                    <a href="{{ url('/about') }}" class="hover:text-gray-300 transition">Recipes</a>
                    <a href="{{ url('/contact') }}" class="hover:text-gray-300 transition">About</a>
                    <a href="{{ url('/blog') }}" class="hover:text-gray-300 transition">Log In</a>
                </nav>
            </div>
        </header>

        <!-- Landing Content: Login Format -->
        <section class="bg-[#fffbe8] py-12 pb-40" style="background-image: url('{{ asset('images/Background/1.png') }}'); background-size: cover; background-position: center;">
            <div class="flex flex-col items-center justify-center min-h-[60vh]">
                <div class="bg-white rounded-lg shadow-lg p-10 w-full max-w-md">
                    <h2 class="text-4xl font-bold text-[#f98323] font-display mb-6 text-center">Log In to The Pantry</h2>
                    <form method="POST" action="#" class="space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="block text-xl font-display text-[#4d2100] mb-2">Email</label>
                            <input type="email" id="email" name="email" required class="w-full p-3 rounded border border-[#f98323] focus:outline-none focus:ring-2 focus:ring-[#f98323] text-lg">
                        </div>
                        <div>
                            <label for="password" class="block text-xl font-display text-[#4d2100] mb-2">Password</label>
                            <input type="password" id="password" name="password" required class="w-full p-3 rounded border border-[#f98323] focus:outline-none focus:ring-2 focus:ring-[#f98323] text-lg">
                        </div>
                        <button type="submit" class="bg-[#f98323] text-white font-display text-xl px-6 py-2 rounded hover:bg-[#d46e0c] transition w-full">Log In</button>
                    </form>
                    <div class="mt-6 text-center">
                        <a href="#" class="text-[#f98323] hover:underline text-lg">Don't have an account? Register</a>
                    </div>
                </div>
            </div>
        </section>

        <footer class="bg-[#fffbe8] py-12 pt-20" style= "background-image: url('{{ asset('images/Background/3.png') }}'); background-size: cover; background-position: center;">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 px-55">
                <!-- Column 1 -->
                <div>
                    <h3 class="text-5xl text-[#4d2100] font-bold mb-2">The Pantry</h3>
                    <p class="text-3xl text-[#4d2100]">A world of recipes, one pantry.</p>
                </div>
                <!-- Column 2 -->
                <div>
                    <h3 class="text-4xl text-[#4d2100] font-bold mb-2">Quick Links</h3>
                    <ul>
                        <li><a href="{{ url('/') }}" class="hover:underline text-3xl text-[#4d2100]">Home</a></li>
                        <li><a href="{{ url('/about') }}" class="hover:underline text-3xl text-[#4d2100]">About</a></li>
                        <li><a href="{{ url('/contact') }}" class="hover:underline text-3xl text-[#4d2100]">Contact</a></li>
                        <li><a href="{{ url('/blog') }}" class="hover:underline text-3xl text-[#4d2100]">Blog</a></li>
                    </ul>
                </div>
                <!-- Column 3 -->
                <div>
                    <h3 class="text-4xl text-[#4d2100] font-bold mb-2">Follow Us</h3>
                    <ul>
                        <li><a href="#" class="hover:underline text-3xl text-[#4d2100]">Instagram</a></li>
                        <li><a href="#" class="hover:underline text-3xl text-[#4d2100]">Facebook</a></li>
                        <li><a href="#" class="hover:underline text-3xl text-[#4d2100]">Twitter</a></li>
                    </ul>
                </div>
                <!-- Row under columns -->
                <div class="md:col-span-3 mt-8">
                    <p class="text-center text-2xl">&copy; {{ date('Y') }} The Pantry. All rights reserved.</p>
                </div>
            </div>
        </footer>
    </body>
</html>
