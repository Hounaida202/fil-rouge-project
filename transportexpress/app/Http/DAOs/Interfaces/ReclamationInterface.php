<?php
namespace App\Http\DAOs\Interfaces;

interface ReclamationInterface {

    public function afficherReclamations();
    public function supprimerReclamations($id);
    public function modifierReclamations($id);

}