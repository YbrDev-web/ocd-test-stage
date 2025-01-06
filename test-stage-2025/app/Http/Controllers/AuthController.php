<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Gère la tentative de connexion.
     */
    public function login(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        // Tentative de connexion avec les identifiants fournis
        if (Auth::attempt($request->only('email', 'password'), $request->filled('remember'))) {
            // Redirige vers la page d'accueil après connexion
            return redirect()->intended('dashboard')->with('success', 'Connexion réussie.');
        }

        // Retourne une erreur si les identifiants sont incorrects
        return back()->withErrors([
            'email' => 'Ces identifiants ne correspondent pas à nos enregistrements.',
        ])->onlyInput('email');
    }

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Déconnexion réussie.');
    }
}


