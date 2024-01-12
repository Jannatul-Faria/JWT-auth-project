<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function userRegistration(Request $request){
    //    return  User::create([
    //     'firstName'=> $request->input('firstName'),
    //     'lastName'=> $request->input('lastName'),
    //     'email'=> $request->input('email'),
    //     'mobile'=> $request->input('mobile'),
    //     'password'=> $request->input('password'),
        
    //     ]);
        
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
}
