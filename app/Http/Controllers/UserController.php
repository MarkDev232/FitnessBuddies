<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Show the user dashboard.
     */
    public function dashboard()
    {
        return view('user.dashboard');
    }

    /**
     * Show the user profile page.
     */
    public function profile()
    {
        return view('user.profile', ['user' => Auth::user()]);
    }

    /**
     * Update user profile details.
     */
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validation rules
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update user details
        $user->name = $request->name;
        $user->email = $request->email;

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->profile_picture) {
                Storage::delete($user->profile_picture);
            }

            // Store new profile picture
            $path = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->profile_picture = $path;
        }
        dd($user, get_class($user));

        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Show the settings page.
     */
    public function settings()
    {
        return view('user.settings');
    }

    /**
     * Update user password.
     */
    public function updatePassword(Request $request)
{
    $request->validate([
        'current_password' => ['required'],
        'new_password'     => ['required', 'confirmed', 'min:8'],
    ]);

    $user = Auth::user();
    $salt = 'MySecureRandomText123!@#'; // Predefined salt

    // Check if current password is correct (with salt applied)
    if ($user->password !== $salt . $request->current_password) {
        return back()->withErrors(['current_password' => 'Incorrect current password.']);
    }

    // Update password WITHOUT hashing, just appending salt
    $user->password = $salt . $request->new_password;
    dd($user, get_class($user));

    $user->save();

    return redirect()->route('settings')->with('success', 'Password updated successfully.');
}


}
