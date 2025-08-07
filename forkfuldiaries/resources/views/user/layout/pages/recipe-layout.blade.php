@extends('user.layout.pages-layout')
@section('pageTitle', 'View Recipe')
@vite('resources/css/app.css')
@vite('resources/js/app.js')
@section('content')
{{-- Title with Image --}}
<div class="bg-white shadow-lg rounded-lg p-6 max-w-4xl mt-10 mb-20 mx-auto">
    <div class="flex items-center">
        @if($recipe->image)
            <img src="{{ asset('storage/' . $recipe->image) }}" 
                 alt="Recipe Image" 
                 class="w-48 h-48 object-cover rounded-lg mr-10">
        @endif

        <div class="flex flex-col justify-center">
            <h1 class="text-3xl font-bold text-[#f98323] mb-2">{{ $recipe->recipes_name }}</h1>
            <p class="text-lg text-gray-700 italic">
                Submitted by: <strong>{{ $recipe->user->name }}</strong>
            </p>
        </div>
    </div>
</div>

{{-- Recipe Content Section --}}
<div class="max-w-4xl mx-auto mt-20 mb-20 ">
    <h2 class="text-2xl font-bold text-[#4d2100] mb-4">Recipe Content</h2>
    <div class="text-gray-800 leading-relaxed bg-gray-50 p-4 rounded">
        <p>{!! nl2br(e($recipe->recipes_file)) !!}</p>
    </div>
</div>

{{-- Back button --}}
<div class="max-w-4xl mx-auto p-4 text-center">
    <div class="inline-block bg-blue-900 px-8 py-4 rounded-md hover:bg-blue-700 transition-colors shadow">
        <a href="{{ route('user.dashboard') }}" class="text-white text-xl mr-2 ml-2">
            Back to Dashboard
        </a>
    </div>  
</div>

@endsection
