@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-white rounded-lg shadow p-6 max-w-3xl mx-auto my-8">
         <div class="text-3xl font-bold text-[#f98323] font-display text-center md:text-left">
               {{ Auth::user()->name ?? 'Admin' }}
        </div>
        <div class="font-display text-3xl italic text-[#4d2100] text-center md:text-right">
            "Tasting, curating, approving."
        </div>
    </div>

    {{-- Pending Recipes --}}
   <h2 class="text-2xl font-bold mb-4">Pending Recipes</h2>
<div class="bg-white shadow-lg rounded-lg p-6 mb-8">
    <ul>
        @foreach($pendingRecipes as $recipe)
            <li class="border-b last:border-b-0 py-4">
                <div class="ml-4">
                    <div>
                        <span class="font-semibold text-xl">{{ $recipe->recipes_name }}</span>
                        <span class="text-xl text-gray-500">(Submitted by {{ $recipe->user->name }})</span>
                    </div>
                    <div class="flex items-center mt-2 ml-8">
                        <a href="{{ route('recipes.show', $recipe->id) }}" 
                            class="text-blue-600 underline hover:text-blue-800 mr-6" 
                            target="_blank">
                            View Recipe
                        </a>
                        <form action="{{ route('recipes.approve', $recipe->id) }}" method="POST" class="mr-2">
                            @csrf
                            <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                        </form>
                        <form action="{{ route('recipes.deny', $recipe->id) }}" method="POST">
                            @csrf
                            <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deny</button>
                        </form>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div> 


    {{-- <h2 class="text-2xl font-bold mb-4">Pending Recipes</h2>
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <ul>
            @foreach($pendingRecipes as $recipe)
                <li class="border-b last:border-b-0 py-4">
                    <div class="ml-4">
                        <div>
                            <span class="font-semibold text-xl">{{ $recipe->title }}</span>
                            <span class="text-xl text-gray-500">(Submitted by {{ $recipe->user->name }})</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                            <a href="{{ $recipe->file_url ?? '#' }}" class="text-blue-600 underline hover:text-blue-800 mr-6">View File</a>
                            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">Add Recipe</button>
                            <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">Deny Recipe</button>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div> --}}

    {{-- User Management --}}
<div class="mt-20 mb-30 font-display">
    <h2 class="text-2xl font-bold mb-4">User Management</h2>

    <div x-data="{ showPending: true }" class="mb-8">

        {{-- Toggle Buttons --}}
        <div class="flex space-x-4 mb-4">
            <button 
                class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700 transition-colors"
                :class="{ 'bg-blue-900': showPending }"
                @click="showPending = true"
            >
                Pending Approvals
            </button>
            <button 
                class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-700 transition-colors"
                :class="{ 'bg-gray-900': !showPending }"
                @click="showPending = false"
            >
                All Users
            </button>
        </div>

        {{-- Pending Users Table --}}
        <div x-show="showPending" class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pendingUsers as $user)
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b text-xl">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b space-x-2 text-xl">
                                <form method="POST" action="{{ route('admin.users.approve', $user->id) }}" class="inline">
                                    @csrf
                                    <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600">Approve</button>
                                </form>
                                <form method="POST" action="{{ route('admin.users.deny', $user->id) }}" class="inline">
                                    @csrf
                                    <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Deny</button>
                                </form>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- All Users Table --}}
        <div x-show="!showPending" class="overflow-x-auto">
            <table class="min-w-full bg-white rounded shadow">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="py-2 px-4 text-left">Name</th>
                        <th class="py-2 px-4 text-left">Email</th>
                        <th class="py-2 px-4 text-left">Role</th>
                        <th class="py-2 px-4 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allUsers as $user)
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b text-xl">{{ $user->email }}</td>
                            <td class="py-2 px-4 border-b text-xl">
                                {{ $user->is_admin ? 'Admin' : 'User' }}
                            </td>
                            <td class="py-2 px-4 border-b text-xl">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>


    {{-- Analytics --}}
    <div class="mt-20 mb-30 font-display">
        <h2 class="text-2xl font-bold mb-4">Analytics</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 text-center">Total Recipes</h3>
                    <p class="text-2xl font-bold text-center">{{ $totalRecipes }}</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 text-center">Total Users</h3>
                    <p class="text-2xl font-bold text-center">{{ $userCount}}</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 text-center">Pending Recipes</h3>
                    <p class="text-2xl font-bold text-center">{{ $pendingCount }}</p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- All Recipes --}}
<div class="mb-30 font-display">
    <p class="text-2xl font-bold text-center">Total Recipes</p>
    <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
        <ul>
            @foreach ($approvedRecipes as $recipe)
                <li class="border-b last:border-b-0 py-4">
                    <div class="ml-4">
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <a class="font-semibold text-3xl text-blue-600 hover:underline">
                                    {{ $recipe->title }}
                                </a>
                                <span class="text-xl text-gray-900"> (Submitted by {{ $recipe->user->name ?? 'Admin' }})</span>
                            </div>
                            <div class="mt-4 sm:mt-0">
                                <a href="{{ route('admin.recipes.view', $recipe->id) }}"
                                class="bg-yellow-400 text-black px-4 py-2 rounded hover:bg-yellow-600 transition-colors">
                                View Link
                                </a
                            </div>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>


@endsection
