<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class UpdateController extends Controller
{
    public function edit($id)
    {
        $person = Person::find($id); // Récupère la personne par ID
        return view('people.update', compact('person'));
    }

    // Mettre à jour la personne
    public function update(Request $request, $id)
    {
        $person = Person::find($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_name' => 'nullable|string|max:255',
            'middle_names' => 'nullable|string|max:255',
            'date_of_birth' => 'nullable|date',
            'created_by' => 'required|integer|exists:users,id',
        ]);

        $person->update($validated); // Met à jour les données validées
        return redirect()->route('people.update', $id)->with('success', 'Les informations ont été mises à jour avec succès.');
    }
}
