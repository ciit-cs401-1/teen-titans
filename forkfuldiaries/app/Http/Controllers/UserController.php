<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function userDashboard(Request $request){
        $topViewedRecipes = \App\Models\Recipe::with('user')
        ->where('status', 'approved')
        ->orderByDesc('recipes_views')
        ->take(5)
        ->get();

        $allRecipes = \App\Models\Recipe::with('user')
            ->where('status', 'approved')
            ->latest()
            ->get();

        $data = [
            'topViewedRecipes' => $topViewedRecipes,
            'allRecipes' => $allRecipes
        ];

        return view('user.layout.pages.dashboard', $data);
    }

    public function userProfile(Request $request){
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('user.layout.pages.profile', $data);
    }

    public function logoutHandler(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('fail', 'Logged out Successfully');
    }

    public function updateProfile(Request $request)
    {
        $user = \App\Models\User::find(Auth::id());

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'bio' => 'nullable|string|max:500',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}