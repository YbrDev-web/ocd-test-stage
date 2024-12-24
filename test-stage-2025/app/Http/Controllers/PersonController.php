<?php

namespace App\Http\Controllers;

use App\Models\Person;
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

    /**
     * Afficher une personne spécifique avec la liste de ses enfants et parents.
     */
    public function show($id)
    {
        $person = Person::with('children', 'parents')->findOrFail($id); // Récupère la personne avec ses relations
        return view('people.show', compact('person'));
    }

    /**
     * Afficher le formulaire de création d'une nouvelle personne.
     */
    public function create()
    {
        return view('people.create');
    }
}
