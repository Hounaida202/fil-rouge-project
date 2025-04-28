<?php
namespace App\Http\DAOs\Interfaces;

interface AuthInterface {

    public function register($data);
    public function login($email);
    

}