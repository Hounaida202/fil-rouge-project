<?php
namespace App\Http\DAOs\Repositories;

use GuzzleHttp\Promise\Create;
use App\Models\User;
use App\Http\DAOs\Interfaces\AuthInterface;

class AuthRepository implements AuthInterface{

    public function register($data)
    {
        return User::create($data);
    }
    public function login($email)
    {
        return User::where('email',$email)->first();       
    }

}