<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reclamation extends Model
{
    use HasFactory;
    protected $fillable=['titre','description','cible_id','auteur_id','status'];
    


    public function cible()
    {
        return $this->belongsTo(User::class, 'cible_id');
    }
    public function auteur()
    {
        return $this->belongsTo(User::class, 'auteur_id');
    }

}
