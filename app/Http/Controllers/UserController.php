<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
 

use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GrahamCampbell\ResultType\Success;

class UserController extends Controller
{

    // registration :
    public function userRegistration(Request $request){
        try {
            $request->validate([
                'firstName'=> 'required|string|max:50',
                'lastName'=>  'required|string|max:50',
                'email'=>  'required|string|email|max:50',
                'mobile'=>'required|string|max:13' ,
                'password'=> 'required|string|min:4',
            ]);

        
                User::create([
                'firstName'=> $request->input('firstName'),
                'lastName'=> $request->input('lastName'),
                'email'=> $request->input('email'),
                'mobile'=> $request->input('mobile'),
                'password'=> $request->input('password'),
                ]);

                return response()->json([
                    'status'=>'Success',
                    'message'=> 'user registration successfully.',
                ]);
            } catch (Exception $e) {               
                return response()->json([
                    'status'=>'Failed',
                    'message'=> $e->getMessage(),
                ]);
        }

        
    }


    //  login :
     public function userLogin(Request $request){
        $count= User::where('email','=',$request->input('email'))
        ->where('password','=',$request->input('password'))
        ->count();

        if($count==1){
            $token = JWTToken::CreateToken($request->input('email'));
           return response()->json([
                'status'=>'success',
                'message'=> 'User Login Successfully.',
                'token'=>$token
            ]);
        
     }else{
            return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
            ]);
     }
     }



     public function SendOtp(Request $request){
        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $count = User::where('email', '=', $email)->count();

        if($count==1) {
            // otp email address
            Mail::to($email)->send(new OTPMail($otp));
            // otp insart
            User::where('email', '=', $email)->update(['otp'=> $otp]);

            return response()->json([
                'status'=>'success',
                'message'=> 'Otp send successfully'
            ]);
        }else{
            return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
            ]);
        }
     }
     public function OtpVerify(Request $request){
         $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();
        if ($count == 1) {
            
        
        }else{
             return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
            ]);
        }





     }
     
}
