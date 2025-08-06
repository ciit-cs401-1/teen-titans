@extends('back.layout.pages-layout')
@section('pageTitle', 'View Recipe')

@section('content')
<div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mx-auto mt-10">
    @if($recipe->image)
        <img src="{{ asset('storage/' . $recipe->image) }}" alt="Recipe Image" class="w-full h-64 object-cover rounded-lg mb-6">
    @endif
    <h1 class="text-3xl font-bold text-[#f98323] mb-4">{{ $recipe->recipes_name }}</h1>
    <p class="text-lg text-gray-700 italic mb-2">Submitted by: <strong>{{ $recipe->user->name }}</strong></p>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-[#4d2100] mb-2">Recipe Content</h2>
        <div class="bg-gray-100 p-4 rounded text-gray-900 whitespace-pre-wrap">
            {{ $recipe->recipes_file }}
        </div>
    </div>

    <div class="mt-6">
        <h2 class="text-xl font-semibold text-[#4d2100] mb-2">Description / Notes</h2>
        <p class="text-gray-800 leading-relaxed">
            {{ $recipe->description ?? 'No description provided.' }}
        </p>
    </div>

    <div class="mt-8">
        <a href="{{ route('admin.dashboard') }}" class="text-white bg-gray-800 px-4 py-2 rounded hover:bg-gray-600">Back to Dashboard</a>
    </div>
</div>
@endsection
