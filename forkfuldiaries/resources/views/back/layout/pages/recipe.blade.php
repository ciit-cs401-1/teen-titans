@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
        {{-- All Recipes --}}
        <div class="mb-30">
        <h2 class="text-2xl font-bold mb-4">All Recipes</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <ul>
                <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                        <div>
                                <a class="font-semibold text-xl text-blue-600 hover:underline">Chocolate Cake</a>
                                <span class="text-xl text-gray-500"> (Submitted by Alice)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                                <button href="#" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Link</button>
                        </div>
                        </div>
                </li>
                <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                        <div>
                                <a class="font-semibold text-xl text-blue-600 hover:underline">Vegan Tacos</a>
                                <span class="text-xl text-gray-500"> (Submitted by Bob)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                                <button href="#" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Link</button>
                        </div>
                        </div>
                </li>
                </ul>
        </div>
        </div>


        {{-- Pending Recipes
        <div class="mb-30">
                <h2 class="text-2xl font-bold mb-4">Pending Recipes</h2>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <ul>
                        <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                                <div>
                                <span class="font-semibold text-xl">Chocolate Cake</span>
                                <span class="text-xl text-gray-500">(Submitted by Alice)</span>
                                </div>
                                <div class="flex items-center mt-2 ml-8">
                                <a href="#" class="text-blue-600 underline hover:text-blue-800 mr-20">View File</a>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">Add Recipe</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">Deny Recipe</button>
                                </div>
                        </div>
                        </li>
                        <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                                <div>
                                <span class="font-semibold text-xl">Vegan Tacos</span>
                                <span class="text-xl text-gray-500">(Submitted by Bob)</span>
                                </div>
                                <div class="flex items-center mt-2 ml-8">
                                <a href="#" class="text-blue-600 underline hover:text-blue-800 mr-20">View File</a>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">Add Recipe</button>
                                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">Deny Recipe</button>
                                </div>
                        </div>
                        </li>
                </ul>
                </div>
        </div> --}}

        Page content here....
@endsection
