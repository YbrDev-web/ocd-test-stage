<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Afficher la liste des personnes avec le nom de l'utilisateur qui les a créées.
     */
    public function index()
    {
        $people = Person::with('creator')->get(); // Récupère les personnes avec leur créateur
        return view('people.index', compact('people'));
    }
}
