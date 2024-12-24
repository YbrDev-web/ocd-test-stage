<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;

    /**
     * Les attributs qui peuvent être remplis en masse.
     */
    protected $fillable = [
        'created_by',
        'parent_id',
        'child_id',
    ];

    /**
     * Relation avec l'utilisateur créateur.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * Relation avec le parent.
     */
    public function parent()
    {
        return $this->belongsTo(Person::class, 'parent_id');
    }
}
