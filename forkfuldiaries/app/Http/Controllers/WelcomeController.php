<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestRecipes = \App\Models\Recipe::with('user')->latest()->take(6)->get();
        $topViewedRecipes = \App\Models\Recipe::with('user')->orderByDesc('recipes_views')->take(8)->get();

        return view('back.layout.pages.welcome', compact('latestRecipes', 'topViewedRecipes'));
    }
}
