<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function register(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
        'contact' => 'required|string|max:15',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
        'contact' => $validated['contact'],
        'role' => $request->input('role', 'user'), // Defaults to 'user'
    ]);

    return response()->json(['message' => 'User registered successfully'], 201);
}


    public function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();

        // Validate user and password
        if (!$user || !Hash::check($req->password, $user->password)) {
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        // Determine redirection based on the role
        $redirect = $user->role === 'admin' ? '/ProductManagement' : '/store';

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
            'redirect' => $redirect
        ], 200);
    }
}
