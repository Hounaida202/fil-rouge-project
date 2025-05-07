<?php
namespace App\Http\DAOs\Interfaces;

interface PublicationInterface {

    public function afficherPublications($id);
    public function afficherAllPublicationspourClient();
    public function afficherAllPublicationspourTransport();

    public function ajouterPublication($data);
}