<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function adminProfile(Request $request){
        $data = [
            'pageTitle' => 'Profile'
        ];
        return view('back.layout.pages.profile', $data);
    }

    public function logoutHandler(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login')->with('fail', 'Logged out Successfully');
    }

    public function update(Request $request)
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

