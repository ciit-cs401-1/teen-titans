<?php
namespace App\Http\Controllers;

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
}
