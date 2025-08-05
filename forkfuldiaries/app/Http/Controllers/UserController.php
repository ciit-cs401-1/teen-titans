<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
<<<<<<< Updated upstream

class UserController extends Controller
{
    public function userDashboard(Request $request){
        $data = [
            'pageTitle' => 'Dashboard'
        ];
        return view('user.layout.pages.dashboard', $data);
    }
=======
use App\Models\Recipe;
use App\Models\User;



class UserController extends Controller
{


public function userDashboard(Request $request)
{
    $pendingRecipes = Recipe::with('user')
        ->where('status', 'pending')
        ->latest()
        ->get();

    $approvedRecipes = Recipe::with('user')
        ->where('status', 'approved')
        ->latest()
        ->get();

    $totalRecipes = Recipe::count();
    $pendingCount = Recipe::where('status', 'pending')->count();
    $userCount = User::count();

    return view('user.layout.pages.dashboard', [
        'pageTitle' => 'Dashboard',
        'pendingRecipes' => $pendingRecipes,
        'approvedRecipes' => $approvedRecipes,
        'totalRecipes' => $totalRecipes,
        'pendingCount' => $pendingCount,
        'userCount' => $userCount,
    ]);
}


>>>>>>> Stashed changes

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

}