<?php

namespace App\Http\Middleware;

use App\Helper\JWTToken;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TokenVerifyMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('token');
        $result=  JWTToken::VarifyToken($token);
        if ($result=="unauthorize") {
             return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
             ],401);
        } else {
            $request->headers->set('email', $result);
            return $next($request);
        }
        
       
    }
}
