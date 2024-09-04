<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6',
        ]);
        $user = User::where('email', $credentials['email'])->first();

        if ($user && $user->is_active == 0) {
            return back()->with('error_message', 'Your account is inactive. Please contact support.');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return to_route('dashboard');
        }
        return back()->with('error_message', 'Credential does not match');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

}