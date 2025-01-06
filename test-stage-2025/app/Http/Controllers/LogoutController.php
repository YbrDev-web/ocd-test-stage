<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Déconnecte l'utilisateur et redirige vers la page d'inscription.
     */
    public function logout(Request $request)
    {
        // Déconnecter l'utilisateur
        Auth::logout();

        // Invalider la session pour plus de sécurité
        $request->session()->invalidate();

        // Générer un nouveau token de session pour éviter les attaques CSRF
        $request->session()->regenerateToken();

        // Rediriger avec un message de succès
        return redirect('/register')->with('success', 'Déconnexion réussie.');
    }
}
