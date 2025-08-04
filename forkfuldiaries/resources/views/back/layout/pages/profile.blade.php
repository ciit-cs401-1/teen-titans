@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Admin Profile')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
    <h2 class="text-3xl font-bold mb-4">Your Profile</h2>

    {{-- Profile Box --}}
    <div class="bg-white p-6 rounded shadow">

        {{-- Profile View --}}
        <div x-show="!editing" x-cloak>
            <div class="mb-4">
                <label class="font-semibold text-gray-600">Name:</label>
                <p class="text-lg">Juan Dela Cruz</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-600">Email:</label>
                <p class="text-lg">juan@example.com</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-600">Bio:</label>
                <p class="text-lg">Passionate home cook who loves to explore Filipino cuisine!</p>
            </div>

            <button @click="editing = true" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                Edit Profile
            </button>
        </div>

        {{-- Edit Form --}}
        <div x-show="editing" x-cloak>
            <form action="#" method="POST">
                {{-- CSRF not needed for static --}}
                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Name</label>
                    <input type="text" name="name" value="Juan Dela Cruz" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" value="juan@example.com" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium mb-1">Bio</label>
                    <textarea name="bio" rows="4" class="w-full border rounded px-3 py-2">Passionate home cook who loves to explore Filipino cuisine!</textarea>
                </div>

                <div class="flex gap-3">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition-colors">
                        Save Changes
                    </button>
                    <button type="button" @click="editing = false" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition-colors">
                        Cancel
                    </button>
                </div>
            </form>
        </div>

    </div>
@endsection
