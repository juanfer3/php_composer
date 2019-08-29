<?php


namespace App\controllers;

use Bcrypt\Bcrypt;
use App\models\User;



class Authentication
{
    public function login()
    {

        header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
        $data = json_decode( file_get_contents('php://input') );

        $user = User::where(['username' => $data->username, 'password' => md5($data->password)])
                        ->first();
        
        header('Content-type: application/json');
        echo json_encode($user);
    }

    public function signup()
    {
        $data = json_decode( file_get_contents('php://input') );

        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz_%&$/=#"@*-+';
        $user = new User();
        $user->name     = $data->name;
        $user->username = $data->username;
        $user->password = md5($data->password);
        $user->token = substr(str_shuffle($permitted_chars), 0, 60);
        
        header('Content-Type: application/json');
        if($user->save()){
            echo json_encode( ['user' => $user, 'status' => 'ok']);
        }else{
            echo json_encode( ['status' => 'error']);
        }
    }


}