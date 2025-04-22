<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\DAOs\Interfaces\UserInterface;
use App\Http\DAOs\Repositories\UserRepository;
use App\Models\User;

class UserController extends Controller
{
         protected $UserRepository;

        public function __construct(UserInterface $UserRepository)
        {
            $this->UserRepository = $UserRepository;
        }

}
