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
}
