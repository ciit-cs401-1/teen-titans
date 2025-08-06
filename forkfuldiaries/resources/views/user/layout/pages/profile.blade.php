@extends('user.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'User Profile')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
    <div class="mt-10 ml-8 font-display" x-data="{ editing: false }">

    {{-- Page Title Outside the Box --}}
    <h2 class="text-3xl font-bold mb-4">Your Profile</h2>

    {{-- Profile Box --}}
    <div class="p-6">

        {{-- Profile View --}}
        <div x-show="!editing" x-cloak>
            <div class="mb-4">
                <label class="font-semibold text-gray-600 text-3xl">Name:</label>
                <p class="text-2xl">{{ Auth::user()->name ?? 'Username' }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-600 text-3xl">Email:</label>
                <p class="text-2xl">{{ Auth::user()->email ?? 'Email' }}</p>
            </div>

            <div class="mb-4">
                <label class="font-semibold text-gray-600 text-3xl">Bio:</label>
                <p class="text-2xl">{{ Auth::user()->bio ?? 'No bio yet.' }}</p>
            </div>

            <button @click="editing = true" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition-colors">
                Edit Profile
            </button>
        </div>

        {{-- Edit Form --}}
        <div x-show="editing" x-cloak>
            <form action="{{ route('user.profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label class="block text-3xl font-medium mb-1">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full border rounded px-3 py-2 text-2xl">
                </div>

                <div class="mb-4">
                    <label class="block text-3xl font-medium mb-1">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full border rounded px-3 py-2 text-2xl">
                </div>

                <div class="mb-4">
                    <label class="block text-3xl font-medium mb-1">Bio</label>
                    <textarea name="bio" rows="4" class="w-full border rounded px-3 py-2 text-2xl">{{ Auth::user()->bio }}</textarea>
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
    </div>
@endsection
