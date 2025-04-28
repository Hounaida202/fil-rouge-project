<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
use App\Models\Note;
use App\Http\DAOs\Interfaces\NoteInterface;

class NoteRepository implements NoteInterface{

    public function count($id)
    {
        return Note::where('cible_id', $id)->count();
    }
    public function avg($id)
    {
        return Note::where('cible_id', $id)->avg('valeur');
    }

}