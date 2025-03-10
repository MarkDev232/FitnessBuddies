<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AuthController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Handle registration
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed', // Ensures password matches confirmation
        ]);

        // Define a constant random text (salt)
        $salt = 'MySecureRandomText123!@#'; // Predefined salt text

        // Append salt to the password without hashing
        $storedPassword = $salt . $request->password;

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $storedPassword, // Storing without hashing (NOT SECURE)
        ]);

        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }



    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Find user by email
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found.']);
        }

        // Define the same salt used during registration
        $salt = 'MySecureRandomText123!@#'; // Predefined salt text

        // Append salt to the entered password
        $enteredPassword = $salt . $request->password;

        // Compare the stored password with the formatted entered password
        if ($enteredPassword !== $user->password) {
            return back()->withErrors(['password' => 'Incorrect password.']);
        }

        // Attempt login manually since Auth::attempt expects hashed passwords
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('dashboard')->with('success', 'Login successful!');
    }






    public function logout(Request $request)
    {
        Auth::logout(); // Log the user out

        // Invalidate the session and regenerate the token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to login page with a success message
        return redirect()->route('login')->with('success', 'Logged out successfully!');
    }
}
