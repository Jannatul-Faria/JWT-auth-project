<?php
namespace App\Helper;


use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JWTToken{
    public static function CreateToken($email):string{
        $key=env("JWT_KEY");
        $payload = [
            'iss'=> "laravel-token",
            'iat'=>time(),
            'exp'=>time()+36*36,
            'email'=> $email,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public function VarifyToken($token):string{

        try {
             $key = env('JWT_KEY');
        $decode = JWT::decode($token, new Key($key, 'HS256'));
        return $decode->email;
        } catch (Exception $e) {
            return 'unauthorize';
        }

       

    }
}
