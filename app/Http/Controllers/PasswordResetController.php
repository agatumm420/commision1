<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\User;
use App\Models\User2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class PasswordResetController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }

    public function sendResetLink(Request $request)
    {
        $email = $request->input('email');

        // Check if user with the given email exists
        $user = User2::where('email', $email)->first();

        if (!$user) {
            return response()->json(['message' => 'User with this email address does not exist.'], 404);
        }

        $token = Str::random(60);

        // Store token in the database
        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now(),
        ]);

        // Send email
        $link = url("/reset-password?token=$token");
//        dd($user->email);
        Mail::to($user->email)->send(new ResetPasswordMail($link));

        return response()->json(['message' => 'Reset link sent to your email.']);
    }
    public function showResetPasswordForm(Request $request)
    {
        $token = $request->input('token');

        return view('reset-password', ['token' => $token]);
    }

    public function resetPassword(Request $request)
    {
        $token = $request->input('token');
        $newPassword = $request->input('new_password');

        // Validate token
        $passwordReset = DB::table('password_resets')->where('token', $token)->first();

        if (!$passwordReset) {
            return response()->json(['message' => 'Invalid token.'], 400);
        }

        // Reset the user's password
        $user = User2::where('email', $passwordReset->email)->first();
        $user->password = bcrypt($newPassword);
        $user->save();

        // Delete the token
        DB::table('password_resets')->where('token', $token)->delete();

        return response()->json(['message' => 'Password has been reset.']);
    }

}


