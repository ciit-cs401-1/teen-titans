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

<!-- Recipe Submission Modal -->
<div id="recipeModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 hidden">
    <div class="bg-white shadow-lg rounded-lg p-5 max-w-xl w-full relative">
        <button onclick="toggleRecipeModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl font-bold">&times;</button>

        <h2 class="text-2xl font-bold mb-4">Submit a New Recipe</h2>
        <form action="{{ route('recipe.submit') }}" method="POST" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="recipes_name" class="block text-lg font-semibold mb-2">Recipe Name</label>
                <input type="text" name="recipes_name" id="recipes_name" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300">
            </div>

            <div>
                <label for="recipes_file" class="block text-lg font-semibold mb-2">Recipe Details</label>
                <input type="text" name="recipes_file" id="recipes_file" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300">
            </div>

            <div>
                <label for="image" class="block text-lg font-semibold mb-2">Upload Image (optional)</label>
                <input type="file" name="image" accept="image/*" id="image" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-orange-300">
            </div>

            <div class="flex justify-end py-2">
                <button type="submit"
                    class="bg-gray-900 text-white px-4 py-2 rounded hover:bg-green-600 transition-colors">
                    Submit Recipe
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Trigger -->
<div class="fixed bottom-6 right-6">
    <button onclick="toggleRecipeModal()" class="bg-black text-white px-4 py-3 rounded font-semibold shadow-lg hover:bg-gray-800">
        Submit a Recipe
    </button>
</div>

<!-- Modal Toggle Script -->
<script>
    function toggleRecipeModal() {
        const modal = document.getElementById('recipeModal');
        modal.classList.toggle('hidden');
    }
</script>

@endsection
