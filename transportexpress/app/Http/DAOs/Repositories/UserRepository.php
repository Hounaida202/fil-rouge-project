<?php
namespace App\Http\DAOs\Repositories;
use App\Models\User;
use App\Models\Remarque;

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
        $user = User::findOrFail($id);
        
        return $user->delete();
    }
    public function ShowComptes($data)
{
    return User::where('status', 'valide')
        ->when($data['search'] ?? null, function ($query, $search) {
            return $query->where('name', 'like', "%$search%");
        })
        ->when($data['role'] ?? null, function ($query, $role) {
            return $query->where('role', $role);
        })
        ->when($data['ville'] ?? null, function ($query, $ville) {
            return $query->where('ville', $ville);
        })
        ->get();
}
}