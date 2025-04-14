<?php

namespace App\DAOs;

use App\Models\User;
use App\DAOs\AdminInterface;

class AdminRepository implements AdminInterface
{
    public function getAttenteUsers()
    {
        return User::where('status', 'en attente')->get();
    }
}
