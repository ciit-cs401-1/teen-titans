@extends('user.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'User Dashboard')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-white rounded-lg shadow p-6 max-w-3xl mx-auto my-8">
         <div class="text-3xl font-bold text-[#f98323] font-display text-center md:text-left">
               {{ Auth::user()->name ?? 'Username' }}
        </div>
        <div class="text-3xl italic text-[#4d2100] text-center md:text-right font-display">
            "What are you cooking, chef?"
        </div>
    </div>

    {{-- Top Viewed Recipes --}}
    <div class="mb-30 font-display">
        <h2 class="font-display text-2xl font-bold mb-4">Top Viewed Recipes</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <ul>
                @foreach($topViewedRecipes as $recipe)
                    <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                            <div>
                                <a class="font-semibold text-3xl text-blue-600 hover:underline">{{ $recipe->recipes_name }}</a>
                                <span class="text-xl text-gray-900"> (Submitted by {{ $recipe->user->name }})</span>
                                <p class="text-xl text-black-400">Views: {{ $recipe->recipes_views }}</p>
                            </div>
                            <div class="flex items-center mt-2 ml-8">
                                <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Recipe</button>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    {{-- All Recipes --}}
    <div class="mb-30 font-display">
        <h2 class="text-2xl font-bold mb-4">All Recipes</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <ul>
                @foreach($allRecipes as $recipe)    
                <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                        <div>
                                <a class="font-semibold text-3xl text-blue-600 hover:underline">{{ $recipe->recipes_name }}</a>
                                <span class="text-xl text-gray-900"> (Submitted by {{ $recipe->user->name }})</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                                <button href="#" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Link</button>
                        </div>
                        </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
