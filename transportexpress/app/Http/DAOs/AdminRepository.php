<?php
namespace App\DAOs;

use GuzzleHttp\Promise\Create;
use App\Models\User;
use App\DAOs\AdminInterface;

class AdminRepository implements AdminInterface{

    public function getAttenteUsers($data)
    {
        return User::where('status', 'en attente')->get();
    }
    
    


}