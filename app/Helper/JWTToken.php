<?php
namespace Helper;

use App\Helper;

class JWTToken{
    public function CreateToken(){
        $key=env("JWT_KEY");
    }

    public function VarifyToken(){

    }
}
