<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\Models\Recipe;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    public function approve($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->status = 'approved';
        $recipe->save();

        return back()->with('success', 'Recipe approved successfully.');
    }

    public function deny($id)
    {
        $recipe = Recipe::findOrFail($id);
        $recipe->status = 'denied';
        $recipe->save();

        return back()->with('fail', 'Recipe denied.');
    }

    public function submit(Request $request)
    {
        // Validate incoming data
        $validated = $request->validate([
            'recipes_name' => 'required|string|max:255',
            'recipes_file' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->store('recipe_images', 'public'); // Store image
        }

        // Create the recipe entry
        Recipe::create([
            'recipes_name' => $validated['recipes_name'],
            'recipes_file' => $validated['recipes_file'],
            'recipes_views' => 0, // default value
            'user_id' => Auth::id(), // current logged in user
            'image' => $imagePath, // store image path
        ]);

        return redirect()->back()->with('success', 'Recipe submitted successfully!');
    }

    public function show(Recipe $recipe)
        {
            return view('back.layout.pages.view-recipe', compact('recipe'));
        }
}
