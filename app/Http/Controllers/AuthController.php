<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    protected function guard()
    {
        return Auth::guard('api');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if ($user && Hash::check($credentials['password'], $user->password)) {
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
        $this->guard()->user()->tokens()->delete();

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

        return response()->json([
            'message' => 'Registrazione completata con successo. Ora puoi effettuare il login.',
            'user' => $user // Aggiunto per confermare la creazione dell'utente
        ], 201); // Assicurati che lo stato HTTP sia 201
    }

    public function registerControllers()
    {
        $controllers = [
            'ReviewController',
            'PostController',
            'ProjectController',
        ];

        foreach ($controllers as $controller) {
            if (!class_exists("App\\Http\\Controllers\\$controller")) {
                return response()->json([
                    'message' => "Il controller $controller non esiste."
                ], 404);
            }
        }

        return response()->json([
            'message' => 'Tutti i controller sono stati registrati correttamente.',
            'controllers' => $controllers
        ]);
    }

    public function protectControllers()
    {
        $controllers = [
            'ReviewController',
            'PostController',
            'ProjectController',
        ];

        foreach ($controllers as $controller) {
            $controllerClass = "App\\Http\\Controllers\\$controller";
            if (class_exists($controllerClass)) {
                app($controllerClass)->middleware('auth:api');
            } else {
                return response()->json([
                    'message' => "Il controller $controller non esiste."
                ], 404);
            }
        }

        return response()->json([
            'message' => 'Tutti i controller sono stati protetti con il middleware auth:api.',
            'controllers' => $controllers
        ]);
    }
}
