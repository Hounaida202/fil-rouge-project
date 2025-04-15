<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Commentaire extends Model
{
    use HasFactory; //Permet de générer des commentaires fictifs via des factories pour les tests ou l'initialisation de la BDD

    protected $fillable = ['description', 'auteur_id', 'cible_id'];

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    
}

