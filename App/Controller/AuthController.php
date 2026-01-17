<?php

namespace App\Controller;

class AuthController{
    public static function register($name,$email,$password){
       $user = [$name,$email,$password];
       return $user;
    }
}