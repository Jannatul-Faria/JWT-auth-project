<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
 

use App\Helper\JWTToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GrahamCampbell\ResultType\Success;
use Illuminate\View\View;

class UserController extends Controller
{

// =============================================================
    //                       View Pages Function
    // =============================================================

public function loginPage():View{
        return view('Backend.Pages.auth.login-page');
}
public function registrationPage():View{
        return view('Backend.Pages.auth.registration-page');
}
public function SendOtpPage():View{
        return view('Backend.Pages.auth.send-otp-page');
}
public function OtpVerifyPage():View{
        return view('Backend.Pages.auth.verify-otp-page');
}
public function ResetPasswordPage():View{
        return view('Backend.Pages.auth.reset-pass-page');
}

public function dashboardPage():View{
        return view('Backend.Pages.dashboard.dashboard-page');
}

public function profile():View{
        return view('Backend.Pages.dashboard.profile-page');
}























    // =============================================================
    //                       Api Function
    // =============================================================

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
        ->select('id')->first();

        if($count !==null){
            $token = JWTToken::CreateToken($request->input('email'),$count->id);
           return response()->json([
                'status'=>'success',
                'message'=> 'User Login Successfully.',
               
            ])->cookie('token', $token, 60*24*30);
        
     }else{
            return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
            ]);
     }
     }


// send otp
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
    //  verify otp
     public function OtpVerify(Request $request){
         $email = $request->input('email');
        $otp = $request->input('otp');
        $count = User::where('email', '=', $email)
            ->where('otp', '=', $otp)->count();


        if ($count == 1) {
            /// update 
             User::where('email', '=', $email)->update(['otp'=> '0']);
            // password reset token issue
             $token = JWTToken::createTokenForPass($request->input('email'));
           return response()->json([
                'status'=>'success',
                'message'=> 'User Login Successfully.',
                
            ])->cookie('token', $token,60*24*30);
            // 
        
        }else{
             return response()->json([
                'status'=>'failed',
                'message'=> 'unauthorize'
            ]);
        }





     }

    //  reset pass
      public function ResetPassword(Request $request){
        try {
            $email = $request->header('email');
            $password = $request->input('password');
            User::where('email',"=",$email)->update(['password' => $password]);
                 return response()->json([
                'status'=>'success',
                'message'=> 'request successfull'
            ]);
        } catch (Exception $e) {
                 return response()->json([
                'status'=>'failed',
                'message'=> 'something is wrong'
            ]);
        }
      }

    //logout
    public function logout(Request $request){
        return redirect("/login")->cookie('token', '', -1);
      }



    public function userprofile(Request $request){
        $email = $request->header('email');
        $user = User::where('email', '=', $email)->first();
        return response()->json([
             'status'=>'success',
            'message'=> 'request successfull',
            'data'=>$user
        ]);
    }

    public function updateprofile(Request $request){
        try {
            $email = $request->header('email');
            $firstName= $request->input('firstName');
            $lastName= $request->input('lastName');
            $mobile=$request->input('mobile');
            $password= $request->input('password');
            User::where('email','=', $email)->update([
                'firstName'=> $firstName,
                'lastName'=> $lastName,
                'mobile'=> $mobile,
                'password'=> $password,
            ]);
       
        return response()->json([
             'status'=>'success',
            'message'=> 'request successfull',
        ]);
        } catch  (Exception $e) {
                 return response()->json([
                'status'=>'failed',
                'message'=> 'something is wrong'
            ]);
        }
        
    }


}
 