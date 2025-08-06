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
        ]);

        // Create the recipe entry
        Recipe::create([
            'recipes_name' => $validated['recipes_name'],
            'recipes_file' => $validated['recipes_file'],
            'recipes_views' => 0, // default value
            'user_id' => Auth::id(), // current logged in user
        ]);

        return redirect()->back()->with('success', 'Recipe submitted successfully!');
    }
}
