@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
    {{-- Pending Recipes --}}
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
    <div class="mt-20 mb-30">
        <h2 class="text-2xl font-bold mb-4">User Management</h2>
        <div x-data="{ showPending: true }" class="mb-8">
            <div class="flex space-x-4 mb-4">
                <button 
                    class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-700 transition-colors mr-2"
                    :class="{ 'bg-blue-700': showPending }"
                    @click="showPending = true"
                >Pending Approvals</button>
                <button 
                    class="px-4 py-2 rounded bg-gray-500 text-white hover:bg-gray-700 transition-colors"
                    :class="{ 'bg-gray-700': !showPending }"
                    @click="showPending = false"
                >All Users</button>
            </div>

            {{-- Pending User Approvals Table --}}
            <div x-show="showPending">
                <h3 class="text-l font-semibold mb-2">Pending User Approvals</h3>
                <table class="min-w-full bg-white border mb-8">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Jane Doe</td>
                            <td class="py-2 px-4 border-b">jane@example.com</td>
                            <td class="py-2 px-4 border-b space-x-2">
                                <button class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition-colors">Approve</button>
                                <button class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition-colors">Deny</button>
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">John Smith</td>
                            <td class="py-2 px-4 border-b">john@example.com</td>
                            <td class="py-2 px-4 border-b space-x-2">
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
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Role</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b">Jane Doe</td>
                            <td class="py-2 px-4 border-b">jane@example.com</td>
                            <td class="py-2 px-4 border-b">User</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">John Smith</td>
                            <td class="py-2 px-4 border-b">john@example.com</td>
                            <td class="py-2 px-4 border-b">Admin</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Alice Lee</td>
                            <td class="py-2 px-4 border-b">alice@example.com</td>
                            <td class="py-2 px-4 border-b">User</td>
                            <td class="py-2 px-4 border-b">
                                <button class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600 transition-colors">Edit</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    {{-- Analytics --}}
    <div class="mt-20 mb-30">
        <h2 class="text-2xl font-bold mb-4">Analytics</h2>
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-blue-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Total Recipes</h3>
                    <p class="text-2xl font-bold">150</p>
                </div>
                <div class="bg-green-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Total Users</h3>
                    <p class="text-2xl font-bold">75</p>
                </div>
                <div class="bg-yellow-100 p-4 rounded-lg">
                    <h3 class="text-xl font-semibold mb-2">Pending Recipes</h3>
                    <p class="text-2xl font-bold">10</p>
                </div>
            </div>
        </div>
    </div>
    
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
@endsection
