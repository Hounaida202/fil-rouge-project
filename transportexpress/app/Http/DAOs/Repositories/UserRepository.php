<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
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

}