<?php
namespace App\Http\DAOs\Interfaces;

interface PublicationInterface {

    public function afficherPublications($id);
    public function afficherAllPublications();
    public function ajouterPublication($data);
}