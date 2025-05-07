<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = ['auteur_id','cible_id','publication_id','reservation_id'];


    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }

    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

    public function cible()
    {
        return $this->belongsTo(User::class, 'cible_id');
    }
    public function reservation()
    {
        return $this->belongsTo(Reservation::class, 'reservation_id');
    }

   
}