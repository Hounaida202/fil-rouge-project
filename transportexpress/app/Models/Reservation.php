<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'publication_id','localisation','autre_id'];
    
    public function publication()
    {
        return $this->belongsTo(Publication::class, 'publication_id');
    }
}
