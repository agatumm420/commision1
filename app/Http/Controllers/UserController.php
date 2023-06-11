<?php

namespace App\Http\Controllers;

use App\Exceptions\UserException;
use App\Mail\ActivationEmail;
use App\Models\User;
use App\Models\User2;
use App\Models\UserActivation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'login' => 'required|string|max:255',
            'password' => 'required|string|min:8',
        ]);

        $user = User2::where('login', $validatedData['login'])->first();

        if (!$user || !Hash::check($validatedData['password'], $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid login credentials',
            ], 401);
        }

        // Typically you would issue a token to the user at this point.
        // You would need to implement this based on your authentication method
        // (JWT, Passport, Sanctum, etc.)

        return response()->json([
            'status' => 'ok',
            'message' => 'Login successful',
            // 'token' => $token, // Assuming you issue a token and pass it to the user.
            'user' => $user,
        ]);
    }
    public function index(Request $request)
    {
        $page = $request->query('page', 1);
        if($page) {
            return User2::paginate(10, ['*'], 'page', $page);
        }
        return User2::paginate(10 );
    }


    public function register(Request $request)
    {


        $validatedData = $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
        dump($validatedData['login']);
        if (!array_key_exists('login', $validatedData) || !array_key_exists('email', $validatedData)) {
            throw new \InvalidArgumentException('Missing required parameters');
        }


        $user = User2::create([
            'login' => $validatedData['login'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'km'=>0,
        ]);
        $token = Str::random(60); // Generate a random 60 character string
        $user->save();
        $activation=UserActivation::create([
            'user_id' => $user->id,
            'token' => hash('sha256', $token),
        ]);
        $activation->save();

        // Now, send the email with the activation link
        $this->sendActivationEmail($user, $token);

        return response()->json(['status' => 'ok',
            'user'=>$user]);

    }

    /**
     * Display the specified resource.
     */
    public function show($id)

    {
        $user = User2::find($id);
        if (!$user) {
        throw new \InvalidArgumentException('Invalid user parameter.');
        }
        return response()->json(['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User2 $user)
    {
        // Validate input data
        $validatedData = $request->validate([
            'login' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255|unique:user2,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Update user data
        $user->login = $validatedData['login'];

        if ($request->has('email')) {
            $user->email = $validatedData['email'];
        }

        if ($request->has('password')) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        // Return success response
        return response()->json([
            'status' => 'ok',
            'message' => 'User updated successfully',
            'data' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User2 $user)
    {
        if (!$user) {
            throw new \Exception("User not found");
        }
        $user->delete();
        return response()->json(['message' => 'User deleted']);
    }
    protected function sendActivationEmail($user, $token)
    {
        $url = url('/user/activation', $token); // Generate the URL for the activation route

        Mail::to($user->email)->send(new ActivationEmail($url));
    }
    public function activate($token)
    {
        $activation = UserActivation::where('token', hash('sha256', $token))->first();

        if (!$activation) {
            throw new UserException('Invalid activation code.');
        }

        $user = $activation->user;
        $user->aktwn_u = true; //changed from $user->active = true;
        $user->save();

        // Delete the activation record
        $activation->delete();

        // Activation successful
        // Show success message or redirect...
        return redirect()->route('activationLink')->with('success', 'Your account has been activated!');


    }

}
