<?php
namespace App\Http\DAOs\Interfaces;

interface UserInterface {

    public function showEnAttente($perPage);
    public function showActifs($perPage);
    public function validerCompte($id);
    
    
}