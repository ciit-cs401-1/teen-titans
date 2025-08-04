@extends('user.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page Title Here')
@section('content')

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center bg-white rounded-lg shadow p-6 max-w-3xl mx-auto my-8">
         <div class="text-3xl font-bold text-[#f98323] font-display text-center md:text-left">
               {{ Auth::user()->name ?? 'Username' }}
        </div>
        <div class="text-2xl italic text-[#4d2100] text-center md:text-right">
            "What are you cooking, chef?"
        </div>
    </div>
    Page content here....
@endsection
