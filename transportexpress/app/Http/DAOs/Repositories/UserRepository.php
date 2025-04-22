<?php
namespace App\Http\DAOs\Repositories;
use App\Models\User;
use App\Http\DAOs\Interfaces\UserInterface;

class UserRepository implements UserInterface{
    public function showEnAttente($perPage)
    {
        return User::where('status', 'en attente')->paginate($perPage);
    }
    
}