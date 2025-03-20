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

    public function register(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => [
            'required',
            'min:8',
            'confirmed',
            'regex:/[a-z]/', // At least one lowercase letter
            'regex:/[A-Z]/', // At least one uppercase letter
            'regex:/[0-9]/', // At least one number
            'regex:/[@$!%*?&]/', // At least one special character
        ],
    ], [
        'password.regex' => 'Password must contain at least one uppercase letter, one lowercase letter, one number, and one special character.',
    ]);

     // Define a constant random text (salt)
     $salt = 'MySecureRandomText123!@#'; // Predefined salt text

     // Append salt to the password without hashing
     $storedPassword = $salt . $request->password;

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $storedPassword, // STORED IN PLAIN TEXT (NOT SECURE)
    ]);

    return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
}




    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login');
    }

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

    // Check if the user is deleted or inactive
    if ($user->deleted_at || $user->status === 'deleted' || $user->status === 'inactive') {
        return back()->withErrors(['email' => 'This account has been deleted or is inactive.']);
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

    return redirect()->route('user.page')->with('success', 'Login successful!');
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
