<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\User;
use Hash;

class ResetPasswordController extends Controller
{
    public function getPassword($token)
    {
        return view('auth.password.reset', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        // Retrieve the password reset record
        $updatePassword = DB::table('password_resets')
            ->where(['email' => $request->email, 'token' => $request->token])
            ->first();

        // Check if the token is valid
        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid or expired token!');
        }

        // Retrieve the user based on the provided email
        $user = User::where('email', $request->email)->first();

        // Check if the user exists
        if ($user) {
            // Update the user's password with the hashed password
            $user->update(['password' => Hash::make($request->password)]);

            // Delete the password reset record
            DB::table('password_resets')->where(['email' => $request->email])->delete();

            return redirect('/')->with('message', 'Your password has been changed!');
        } else {
            return back()->withInput()->with('error', 'Failed to update password. Please try again.');
        }
    }
}
