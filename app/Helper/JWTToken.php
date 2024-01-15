<?php
namespace App\Helper;


use Exception;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use GuzzleHttp\Psr7\Request;

class JWTToken{
    public static function CreateToken($email):string{
        $key=env("JWT_KEY");
        $payload = [
            'iss'=> "laravel-token",
            'iat'=>time(),
            'exp'=>time()+60*60,
            'email'=> $email,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }

    public static function createTokenForPass( $email){
        $key=env("JWT_KEY");
        $payload = [
            'iss'=> "laravel-token",
            'iat'=>time(),
            'exp'=>time()+60*5,
            'email'=> $email,
        ];
        return JWT::encode($payload, $key, 'HS256');
    }
    public static function VarifyToken($token):string{

        try {
             $key = env('JWT_KEY');
        $decode = JWT::decode($token, new Key($key, 'HS256'));
        return $decode->email;
        } catch (Exception $e) {
            return 'unauthorize';
        }

       

    }
}
