<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userRegistation(Request $request){
        // must be implement try catch:
        try {
            // validation
            $request->validate([
                'firstname' =>'required|string|max:50',
                 'lastname'=>'required|string|max:50',
                 'email'=>'required|string|email|unique:users,email|max:50', 
                 'mobile'=>'required|string|max:13', 
                'password'=>'required|string|min:4'
            ]);

            // create user 
            User::create([
                'firstname' =>$request->input('firstname'),
                 'lastname' =>$request->input('lastname'),
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

    public function userProfile(Request $request){
        
          return  Auth::user();
       //return  Auth::email();// if i want to get only email , but it does not get :-()
        // return  Auth::id();// its get
        // return  Auth::user()['firstname']; //get specific data        
    }


    public function logOut(Request $request){
        $request->user()->tokens()->delete();
        return redirect('/userLogin');
    }


    public function userUpdate(Request $request){
          try {
            // validation
            $request->validate([
                'firstname' =>'required|string|max:50',
                 'lastname'=>'required|string|max:50',
                  //'email'=>'required|string|email|unique:users,email|max:50',
                 'mobile'=>'required|string|max:13', 
               
            ]);

            // create user 
            User::where('id','=', Auth::id())->update ([
                'firstname' =>$request->input('firstname'),
                 'lastname' =>$request->input('lastname'),
                 'email' =>$request->input('email'), 
                 'mobile' =>$request->input('mobile'), 
              
            ]);

            return response()->json(['status' => 'success', 'message' => 'User update successfully.']);

        } catch (Exception $e) {
            return response()->json(['status' => 'Fail', 'message' => $e->getMessage()]);
        }
    }
}
