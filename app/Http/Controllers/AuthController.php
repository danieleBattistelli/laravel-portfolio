<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Login effettuato con successo',
                'token' => $token,
                'user' => $user,
            ]);
        }

        return response()->json(['message' => 'Credenziali non valide'], 401);
    }

    public function logout(Request $request)
    {
        // Elimina tutti i token dell'utente autenticato
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Logout effettuato con successo']);
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        return response()->json(['message' => 'Registrazione completata con successo', 'user' => $user], 201);
    }
}
