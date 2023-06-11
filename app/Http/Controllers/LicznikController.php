<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User2;

class LicznikController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('login', 'password');

        if (Auth::guard('user2')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/licznik');
        }

        return redirect('/')->withErrors(['login' => 'The provided credentials do not match our records.']);
    }


public function licznik()
{
    $user = Auth::guard('user2')->user();
return view('licznik', compact('user'));
}
}
