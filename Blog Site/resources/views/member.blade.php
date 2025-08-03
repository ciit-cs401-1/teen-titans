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
                    <a href="{{ url('/blog') }}" class="hover:text-gray-300 transition">Log Out</a>
                </nav>
            </div>
        </header>

        <!-- Landing Content -->
        <section class="bg-[#fffbe8] py-12 pb-40" style= "background-image: url('{{ asset('images/Background/1.png') }}'); background-size: cover; background-position: center;">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-white rounded-lg shadow p-6 max-w-3xl mx-auto my-8">
                <div class="text-3xl font-bold text-[#f98323] font-display text-center md:text-left">
                    {{ Auth::user()->name ?? 'Username' }}
                </div>
                <div class="text-2xl italic text-[#4d2100] text-center md:text-right">
                    "What are you cooking, chef?"
                </div>
            </div>
            <div class="w-full px-55 flex justify-between items-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 container mx-auto">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-end h-full">
                        <a href="{{ url('/breakfast') }}" class="flex flex-col items-center group">
                            <h2 class="text-4xl font-semibold mb-0 text-center text-[#f98323] mb-4">Breakfast</h2>
                            <img src="{{ asset('images/breakfast image.webp') }}" alt="Breakfast Image" class="w-full h-75 object-cover mb-2 rounded group-hover:opacity-80 transition">
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-end h-full">
                        <a href="{{ url('/breakfast') }}" class="flex flex-col items-center group">
                            <h2 class="text-4xl font-semibold mb-0 text-center text-[#f98323] mb-4">Lunch</h2>
                            <img src="{{ asset('images/lunch image.jpg') }}" alt="Lunch Image" class="w-full h-75 object-cover mb-2 rounded group-hover:opacity-80 transition">
                        </a>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-end h-full">
                        <a href="{{ url('/breakfast') }}" class="flex flex-col items-center group">
                            <h2 class="text-4xl font-semibold mb-0 text-center text-[#f98323] mb-4">Dinner</h2>
                            <img src="{{ asset('images/dinner image.jpg') }}" alt="Dinner Image" class="w-full h-75 object-cover mb-2 rounded group-hover:opacity-80 transition">
                        </a>
                    </div>

                </div>
            </div>
        </section>

        <!--Main Content-->
        <section class="bg-[#fffbe8] py-12 pb-40">
            <!-- Titles Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 px-55 mt-12">
                <h2 class="text-5xl text-[#4d2100] font-semibold mb-4 text-center font-display">The Latest Recipes</h2>
                <h2 class="text-5xl text-[#4d2100] font-semibold mb-4 text-center font-display">Top Viewed Recipes</h2>
            </div>
            <!-- Content Row -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 w-full px-55">
                <div class="p-6">
                    <div class="grid grid-cols-1 gap-4">
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition flex items-center gap-4">
                            <img src="{{ asset('images/Recipes/mashed-potato.jpg') }}" alt="Mashed Potato" class="w-50 h-50 object-cover rounded mb-0">
                            <div>
                                <h3 class="font-display text-4xl text-[#4d2100] font-semibold mb-2">Mashed Potato</h3>
                                <p class="font-display text-[#4d2100] mb-2 text-2xl">Quick 30-min mashed potato with rich creamy gravy.</p>
                                <a href="{{ url('/recipe-of-the-day') }}" class="font-display text-[#f98323] text-3xl hover:underline">Recipe Here</a>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition flex items-center gap-4">
                            <img src="{{ asset('images/Recipes/mashed-potato.jpg') }}" alt="Mashed Potato" class="w-50 h-50 object-cover rounded mb-0">
                            <div>
                                <h3 class="font-display text-4xl text-[#4d2100] font-semibold mb-2">Mashed Potato</h3>
                                <p class="font-display text-[#4d2100] mb-2 text-2xl">Quick 30-min mashed potato with rich creamy gravy.</p>
                                <a href="{{ url('/recipe-of-the-day') }}" class="font-display text-[#f98323] text-3xl hover:underline">Recipe Here</a>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition flex items-center gap-4">
                            <img src="{{ asset('images/Recipes/mashed-potato.jpg') }}" alt="Mashed Potato" class="w-50 h-50 object-cover rounded mb-0">
                            <div>
                                <h3 class="font-display text-4xl text-[#4d2100] font-semibold mb-2">Mashed Potato</h3>
                                <p class="font-display text-[#4d2100] mb-2 text-2xl">Quick 30-min mashed potato with rich creamy gravy.</p>
                                <a href="{{ url('/recipe-of-the-day') }}" class="font-display text-[#f98323] text-3xl hover:underline">Recipe Here</a>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition flex items-center gap-4">
                            <img src="{{ asset('images/Recipes/mashed-potato.jpg') }}" alt="Mashed Potato" class="w-50 h-50 object-cover rounded mb-0">
                            <div>
                                <h3 class="font-display text-4xl text-[#4d2100] font-semibold mb-2">Mashed Potato</h3>
                                <p class="font-display text-[#4d2100] mb-2 text-2xl">Quick 30-min mashed potato with rich creamy gravy.</p>
                                <a href="{{ url('/recipe-of-the-day') }}" class="font-display text-[#f98323] text-3xl hover:underline">Recipe Here</a>
                            </div>
                        </div>
                        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition flex items-center gap-4">
                            <img src="{{ asset('images/Recipes/mashed-potato.jpg') }}" alt="Mashed Potato" class="w-50 h-50 object-cover rounded mb-0">
                            <div>
                                <h3 class="font-display text-4xl text-[#4d2100] font-semibold mb-2">Mashed Potato</h3>
                                <p class="font-display text-[#4d2100] mb-2 text-2xl">Quick 30-min mashed potato with rich creamy gravy.</p>
                                <a href="{{ url('/recipe-of-the-day') }}" class="font-display text-[#f98323] text-3xl hover:underline">Recipe Here</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col justify-center">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">1.</span>
                                    <a href="{{ url('/top1-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 1</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">2.</span>
                                    <a href="{{ url('/top2-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 2</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">3.</span>
                                    <a href="{{ url('/top3-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 3</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">4.</span>
                                    <a href="{{ url('/top4-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 4</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">5.</span>
                                    <a href="{{ url('/top5-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 5</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">6.</span>
                                    <a href="{{ url('/top6-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 6</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">7.</span>
                                    <a href="{{ url('/top7-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 7</a>
                                </div>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-2">
                                    <span class="font-display text-4xl font-bold text-[#8b4016]">8.</span>
                                    <a href="{{ url('/top8-viewed-page') }}" class="text-3xl text-[#f98323] hover:underline font-semibold">Recipe Name 8</a>
                                </div>
                            </div>
                            <!-- Add more recipes as needed -->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Send Recipes Section -->
        <section class="bg-[#fffbe8] py-12 pt-40 pb-40" style="background-image: url('{{ asset('images/Background/2.png') }}'); background-size: cover; background-position: center;">
            <div>
                <h2 class="text-6xl text-[#f98323] font-bold mb-10 text-center font-display">Have a Recipe?</h2>
            </div>
            <div class="max-w-6xl mx-auto bg-white rounded-lg shadow-lg p-10">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <!-- Left: Image -->
                    <div class="flex items-center justify-center">
                        <img src="{{ asset('images/About us/photo 1.jpg') }}" alt="Share Your Recipe" class="w-100 h-100 object-cover rounded-lg shadow">
                    </div>
                    <!-- Right: Form -->
                    <form action="{{ url('/submit-recipe') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-2xl font-display text-[#4d2100] mb-2" for="title">Recipe Title</label>
                            <input type="text" id="title" name="title" required class="w-full p-3 rounded border border-[#f98323] focus:outline-none focus:ring-2 focus:ring-[#f98323] text-xl">
                        </div>
                        <div>
                            <label class="block text-2xl font-display text-[#4d2100] mb-2" for="description">Description</label>
                            <textarea id="description" name="description" rows="3" required class="w-full p-3 rounded border border-[#f98323] focus:outline-none focus:ring-2 focus:ring-[#f98323] text-xl"></textarea>
                        </div>
                        <div>
                            <label class="block text-2xl font-display text-[#4d2100] mb-2" for="image">Recipe Image</label>
                            <input type="file" id="image" name="image" accept="image/*" class="w-full text-xl border border-[#f98323] rounded p-3 focus:outline-none focus:ring-2 focus:ring-[#f98323] hover:bg-[#f98323] hover:text-white transition">
                        </div>
                        <button type="submit" class="bg-[#f98323] text-white font-display text-2xl px-6 py-2 rounded hover:bg-[#d46e0c] transition">Submit Recipe</button>
                    </form>
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
