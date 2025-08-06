<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\UserType;
use App\UserStatus;

class SignupController extends Controller
{
    public function showRegistrationForm(Request $request){
        return view('signup');
    }

    public function signup(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'username' => 'required|string|max:255|unique:users',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'username' => $request->username,
            'type' => UserType::User, // Assuming a default user type
            'status' => UserStatus::Pending, // Assuming a default active status
        ]);

        Auth::login($user);

        return redirect()->route('login')->with('success', 'Registration successful!');
    }

}
