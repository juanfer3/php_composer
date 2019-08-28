<?php

namespace App\controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\models\User;

class Authentication
{
    public function login()
    {
        $users = User::get();
        //header('Content-type: application/json');
        echo json_encode($users);
    }
}