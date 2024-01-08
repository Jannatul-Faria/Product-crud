<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\TryCatch;

class UserController extends Controller
{
    public function userRegistation(Request $request){
        try {
            $request->validate([
                'firstName' =>'required|string|max:50',
                 'lastName'=>'required|string|max:50',
                 'email'=>'required|string|email|unique:users,email|max:50', 
                 'mobile'=>'required|string|max:13', 
                'password'=>'required|string|min:4'
            ]);

            User::create([
                'firstName' =>$request->input('firstName'),
                 'lastName' =>$request->input('lastName'),
                 'email' =>$request->input('email'), 
                 'mobile' =>$request->input('mobile'), 
                'password' =>Hash::make($request->input('password')) 
            ]);

            return response()->json(['status' => 'success', 'message' => 'User registration successfully.']);

        } catch (Exception $e) {
            return response()->json(['status' => 'Fail', 'message' => $e->getMessage()]);
        }
    }

    public function userLogin(Request $request){

        try {
            /// validation:
            $request->validate([
                'email'=>'required|string|email|max:50', 
                'password'=>'required|string|min:4'
            ]);


            //cheacking:
            $user = User::where('email', $request->input('email'))->first(); 


            // condition:
            // Hash::check('plainText' , 'hashText'); -> to understand
            if ( !$user || !Hash::check($request->input('password'), $user->password) ) {
                return response()->json(['status' => 'Fail', 'message' => 'Invalid User']);
            }
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'Login Successful' , 'token'=> $token]);



        } catch (Exception $e) {
            return response()->json(['status' => 'Fail', 'message' => $e->getMessage()]);
        }
        

    }

    
}
