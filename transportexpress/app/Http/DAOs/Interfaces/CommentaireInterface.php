<?php
namespace App\Http\DAOs\Interfaces;

interface CommentaireInterface {

    public function afficherCommentaires($id);
    public function count($id);

    
}