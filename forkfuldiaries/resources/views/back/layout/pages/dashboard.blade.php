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
    <div class="mb-30 font-display">
        <h2 class="text-2xl font-bold mb-4">Pending Recipes</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <ul>
                <li class="border-b last:border-b-0 py-4">
                    <div class="ml-4">
                        <div>
                            <span class="font-semibold text-3xl">Chocolate Cake</span>
                            <span class="text-xl text-gray-900">(Submitted by Alice)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                            <a href="#" class="text-blue-900 underline hover:text-blue-800 mr-20">View File</a>
                            <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">Add Recipe</button>
                            <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">Deny Recipe</button>
                        </div>
                    </div>
                </li>
                <li class="border-b last:border-b-0 py-4">
                    <div class="ml-4">
                        <div>
                            <span class="font-semibold text-3xl">Vegan Tacos</span>
                            <span class="text-xl text-gray-900">(Submitted by Bob)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                            <a href="#" class="text-blue-900 underline hover:text-blue-800 mr-20">View File</a>
                            <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">Add Recipe</button>
                            <button class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-red-600 transition-colors">Deny Recipe</button>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
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
            <div class="flex space-x-4 mb-4">
                <button 
                    class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700 transition-colors mr-2"
                    :class="{ 'bg-blue-900': showPending }"
                    @click="showPending = true"
                >Pending Approvals</button>
                <button 
                    class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-700 transition-colors"
                    :class="{ 'bg-gray-900': !showPending }"
                    @click="showPending = false"
                >All Users</button>
            </div>

            {{-- Pending User Approvals Table --}}
            <div x-show="showPending">
                <h3 class="text-xl font-semibold mb-2">Pending User Approvals</h3>
                <table class="min-w-full bg-white border mb-8">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-2xl">Name</th>
                            <th class="py-2 px-4 border-b text-2xl">Email</th>
                            <th class="py-2 px-4 border-b text-2xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">Jane Doe</td>
                            <td class="py-2 px-4 border-b text-xl">jane@example.com</td>
                            <td class="py-2 px-4 border-b space-x-2 text-xl">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors">Approve</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors">Deny</button>
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">John Smith</td>
                            <td class="py-2 px-4 border-b text-xl">john@example.com</td>
                            <td class="py-2 px-4 border-b space-x-2 text-xl">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors">Approve</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors">Deny</button>
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- All Users Table --}}
            <div x-show="!showPending">
                <h3 class="text-l font-semibold mb-2">All Users</h3>
                <table class="min-w-full bg-white border mb-8">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b text-2xl">Name</th>
                            <th class="py-2 px-4 border-b text-2xl">Email</th>
                            <th class="py-2 px-4 border-b text-2xl">Role</th>
                            <th class="py-2 px-4 border-b text-2xl">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">Jane Doe</td>
                            <td class="py-2 px-4 border-b text-xl">jane@example.com</td>
                            <td class="py-2 px-4 border-b text-xl">User</td>
                            <td class="py-2 px-4 border-b text-xl">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">John Smith</td>
                            <td class="py-2 px-4 border-b text-xl">john@example.com</td>
                            <td class="py-2 px-4 border-b text-xl">Admin</td>
                            <td class="py-2 px-4 border-b text-xl">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b text-xl">Alice Lee</td>
                            <td class="py-2 px-4 border-b text-xl">alice@example.com</td>
                            <td class="py-2 px-4 border-b text-xl">User</td>
                            <td class="py-2 px-4 border-b text-xl">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
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
                    <p class="text-2xl font-bold text-center">150</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 text-center">Total Users</h3>
                    <p class="text-2xl font-bold text-center">75</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2 text-center">Pending Recipes</h3>
                    <p class="text-2xl font-bold text-center">10</p>
                </div>
            </div>
        </div>
    </div>
    
    {{-- All Recipes --}}
    <div class="mb-30 font-display">
        <h2 class="text-2xl font-bold mb-4">All Recipes</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
                <ul>
                <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                        <div>
                                <a class="font-semibold text-3xl text-blue-600 hover:underline">Chocolate Cake</a>
                                <span class="text-xl text-gray-900"> (Submitted by Alice)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                                <button href="#" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Link</button>
                        </div>
                        </div>
                </li>
                <li class="border-b last:border-b-0 py-4">
                        <div class="ml-4">
                        <div>
                                <a class="font-semibold text-3xl text-blue-600 hover:underline">Vegan Tacos</a>
                                <span class="text-xl text-gray-900"> (Submitted by Bob)</span>
                        </div>
                        <div class="flex items-center mt-2 ml-8">
                                <button href="#" class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors mr-2">View Link</button>
                        </div>
                        </div>
                </li>
                </ul>
        </div>
    </div>
@endsection
