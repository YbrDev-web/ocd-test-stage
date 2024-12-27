<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis en masse.
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_name',
        'middle_names',
        'date_of_birth',
        'created_by',
    ];

    /**
     * Une personne peut avoir plusieurs enfants (relation parent-enfant).
     */
    public function children()
    {
        return $this->belongsToMany(
            Person::class,
            'relationships',
            'parent_id',
            'child_id'
        );
    }

    /**
     * Une personne peut avoir plusieurs parents (relation enfant-parent).
     */
    public function parents()
    {
        return $this->belongsToMany(
            Person::class,
            'relationships',
            'child_id',
            'parent_id'
        );
    }

    /**
     * Une personne a été créée par un utilisateur.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function getDegreeWith($target_person_id)
    {
        // Étape 1 : Initialisation d'une file pour effectuer une recherche BFS.
        $queue = [[
            'person_id' => $this->id,
            'degree' => 0
        ]];
        $visited = [$this->id]; // Marque les personnes déjà visitées.

        while (!empty($queue)) {
            $current = array_shift($queue);
            $current_person_id = $current['person_id'];
            $current_degree = $current['degree'];

            // Étape 2 : Si la personne actuelle correspond à la cible, renvoyer le degré.
            if ($current_person_id == $target_person_id) {
                return $current_degree;
            }

            // Étape 3 : Récupérer les relations parent-enfant pour continuer la recherche.
            $related_person_ids = Relationship::where('parent_id', $current_person_id)
                ->orWhere('child_id', $current_person_id)
                ->get()
                ->map(function ($relation) use ($current_person_id) {
                    return $relation->parent_id == $current_person_id ? $relation->child_id : $relation->parent_id;
                })
                ->filter(function ($id) use ($visited) {
                    return !in_array($id, $visited);
                })
                ->values();

            // Ajouter les personnes liées à la file et les marquer comme visitées.
            foreach ($related_person_ids as $related_person_id) {
                $queue[] = [
                    'person_id' => $related_person_id,
                    'degree' => $current_degree + 1
                ];
                $visited[] = $related_person_id;
            }
        }

        // Si aucune relation n'est trouvée, renvoyer null.
        return null;
    }
}
