<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable=['titre','ville_depart','adresse_depart','ville_arrivee','adresse_arrivee','date_depart',
'type','poids','description','image','prix','user_id'];

    

}
