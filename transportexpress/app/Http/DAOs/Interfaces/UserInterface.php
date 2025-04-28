<?php
namespace App\Http\DAOs\Interfaces;

interface UserInterface {

    public function showEnAttente($perPage);
    public function showActifs($perPage);
    public function validerCompte($id);
    public function invaliderCompte($id);
    public function DesactiverCompte($id);
    public function ActiverCompte($id);
    public function SupprimerCompte($id);
    public function ShowComptes($data);

    
}