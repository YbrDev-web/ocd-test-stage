<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Assurez-vous que cette vue existe
    }

    /**
     * Gère la connexion d'un utilisateur.
     */
    public function login(Request $request)
    {
        // Validation des champs de connexion
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|max:255',
        ]);

        // En cas d'échec de validation
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Tentative de connexion
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Connexion réussie
            return redirect()->route('people.index')->with('success', 'Connexion réussie !');
        }

        // Connexion échouée
        return redirect()->back()
            ->withErrors(['email' => 'Ces informations d’identification ne correspondent pas à nos enregistrements.'])
            ->withInput();
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout()
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'Vous êtes maintenant déconnecté.');
    }
}



