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

    /**
     * Valider les données et insérer une nouvelle personne, puis rediriger vers index.
     */
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'created_by' => 'required|exists:users,id', // L'utilisateur doit exister
        ]);

        // Création de la personne
        try {
            Person::create($validated);
            return redirect()->route('people.index')->with('success', 'Personne créée avec succès.');
        } catch (\Exception $e) {
            return redirect()->route('people.create')->with('error', 'Une erreur est survenue : ' . $e->getMessage());
        }
    }

    public function testDegree()
    {
        DB::enableQueryLog();
        $timestart = microtime(true);

        $person = Person::findOrFail(84); // Exemple : personne de départ
        $degree = $person->getDegreeWith(1265); // Exemple : personne cible

        return response()->json([
            "degree" => $degree,
            "time" => microtime(true) - $timestart,
            "nb_queries" => count(DB::getQueryLog()),
        ]);
    }
}
