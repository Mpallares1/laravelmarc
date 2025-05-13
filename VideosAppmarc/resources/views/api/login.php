<?php

use http\Client\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // Check if the email is a Gmail account
    if (!str_ends_with($user->email, '@gmail.com')) {
        return response()->json(['message' => 'Only Gmail accounts are allowed'], 403);
    }

    $token = $user->createToken('authToken')->plainTextToken;

    return response()->json(['token' => $token]);
}
