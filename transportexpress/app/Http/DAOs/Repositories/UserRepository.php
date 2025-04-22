<?php
namespace App\Http\DAOs\Repositories;
use App\Models\User;
use App\Http\DAOs\Interfaces\UserInterface;

class UserRepository implements UserInterface{
    public function showEnAttente($perPage)
    {
        return User::where('status', 'en attente')->paginate($perPage);
    }
    public function showActifs($perPage)
    {
        return User::where('status', 'valide')->paginate($perPage);
    }
    public function validerCompte($id)
    {
        return User::find($id);
    }
    public function invaliderCompte($id)
    {
        return User::find($id);
    }
    public function DesactiverCompte($id)
    {
        return User::find($id);
    }
    public function ActiverCompte($id)
    {
        return User::find($id);
    }
    public function SupprimerCompte($id)
    {
        return User::find($id);
    }
}