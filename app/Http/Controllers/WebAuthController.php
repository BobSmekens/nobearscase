<?php

namespace App\Http\Controllers;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class WebAuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.registration');
    }

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);


        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'is_admin' => -1
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;
        session(['token' => $token]);



        return view('dashboard', [
            'user' => $user
        ]);

    }

    public function logout(Request $request)
    {
        session()->forget('token');

        return view('auth.login', [
            'message' => 'logged out'
        ]);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // check email
        $user = User::where('email', $fields['email'])->first();
        // check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return back()->with('message', 'wrong credentials');
        }
        $token = $user->createToken('myapptoken')->plainTextToken;
        session(['token' => $token]);
        
        return view('dashboard', [
           'user' => $user
        ]);

    }
}
