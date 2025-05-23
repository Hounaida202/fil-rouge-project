<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    protected $fillable=['titre','ville_depart','adresse_depart','ville_arrivee','adresse_arrivee','date_depart',
'type','poids','description','image','prix','etat','localisation','user_id'];

public function reservations()
{
    return $this->hasMany(Reservation::class, 'publication_id');
}
public function cible()
{
    return $this->belongsTo(User::class, 'user_id');
}
public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
