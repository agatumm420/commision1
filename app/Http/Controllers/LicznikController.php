<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User2;
use Illuminate\Support\Facades\Hash;

class LicznikController extends Controller
{
    public function login(Request $request)
    {
        // get the login and password from the request
        $validatedData = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User2::where('login', $validatedData['login'])->first();

        if (!$user || !(md5($validatedData['password'])== $user->password)) {
            return redirect('/')->withErrors(['login' => 'The provided credentials do not match our records.']);
        }

        // if not found or password doesn't match, redirect back with error
//        Auth::guard('users2')->login($user);

        // redirect to the intended page
      //  dump($user);
        return redirect()->intended('/licznik')->with('user_id', $user->id);;

    }


public function licznik()
{
    $user_id = session('user_id');
    $user = User2::find($user_id);

    return view('licznik',['user' => $user]);
}
}
