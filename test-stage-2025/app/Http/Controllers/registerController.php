<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    /**
     * Gère la tentative de connexion.
     */
    public function register(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'name'=>'required|name',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);
    }
}
