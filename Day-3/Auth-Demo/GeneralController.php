<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneralController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('profile');
    }

    public function register()
    {
        // Create demo user
        $demoEmail = 'demo@example.com';
        $demoPassword = 'password';

        $user = User::where('email', $demoEmail)->first();

        if (!$user) {
            User::factory()->create([
                'email' => $demoEmail,
                'password' => bcrypt($demoPassword),
            ]);
        }

        return redirect()->route('login');
    }

    public function loginPage()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('profile');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
        
    }
}
