<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // On cherche l'utilisateur par son email
        $user = User::where('email', $fields['email'])->first();

        // On vérifie le mot de passe manuellement (Pas de Auth::attempt ici !)
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response()->json([
                'message' => 'Mauvais identifiants'
            ], 401);
        }

        // Si c'est bon, on génère un NOUVEAU token
        $token = $user->createToken('monAppToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    /**
     * Gère la déconnexion (Logout)
     */
    public function logout(Request $request)
    {
        // On récupère l'utilisateur actuellement authentifié via le token
        // et on supprime le token qu'il utilise actuellement.
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Déconnecté avec succès (Token détruit)'
        ]);
    }

    public function register(Request $request)
    {
        // Validation des données
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed' // exige un champ password_confirmation
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);

        // *** C'est ici que la magie Sanctum opère ***
        // On crée un token pour cet utilisateur
        $token = $user->createToken('monAppToken')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 201);
    }

    public function profile(Request $request) {
        return response()->json([
            'message' => 'Profil récupéré avec succès',
            'data' => $request->user()
        ]);
    }
}