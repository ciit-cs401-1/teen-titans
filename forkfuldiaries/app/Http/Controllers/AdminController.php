<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function adminDashboard()
{
    $pendingRecipes = Recipe::with('user')->where('status', 'pending')->latest()->get();
    $approvedRecipes = Recipe::with('user')->where('status', 'approved')->latest()->get();
    $totalRecipes = Recipe::count();
    $pendingCount = Recipe::where('status', 'pending')->count();
    $userCount = User::count();

    $pendingUsers = User::where('is_approved', false)->get();
    $allUsers = User::all();

    return view('back.layout.pages.dashboard', [
        'pendingRecipes' => $pendingRecipes,
        'approvedRecipes' => $approvedRecipes,
        'totalRecipes' => $totalRecipes,
        'pendingCount' => $pendingCount,
        'userCount' => $userCount,
        'pendingUsers' => $pendingUsers,
        'allUsers' => $allUsers,
    ]);
}

    public function logoutHandler(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('fail', 'Logged out Successfully');
    }

    
public function approveUser(User $user)
    {
    $user->update(['is_approved' => true]);
    return back()->with('success', 'User approved successfully.');
    }

public function denyUser(User $user)
    {
    $user->delete(); // or maybe just mark them as rejected if you want
    return back()->with('success', 'User denied and deleted.');
    }

public function editUser(User $user)
    {
    return view('back.layout.pages.edit', compact('user'));
    }

    public function viewRecipe($id)
    {
    $recipe = Recipe::with('user')->findOrFail($id);

    return view('back.layout.pages.view-recipe', compact('recipe'));
    }
    


}
