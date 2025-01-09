<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;


class DeleteController extends Controller
{    
    public function delete($id)
    {
        $person = Person::find($id); // Récupère la personne par ID
        
        if(!$person){
            return response()->json(['message' => 'personne non trouvée.'], 404);
        }

        $person->delete();

        return response()->json(['message' => 'personne supprimée.'], 200);
    }
}
