<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Mail\OTPMail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function sentOtp(Request $request){

        try {
             $request->validate([
            'email'=>'required| string | email| max:50'
        ]);

        $email = $request->input('email');
        $otp = rand(1000, 9999);
        $count=User::where('email', '=', $email)->count();

         
        if($count==1){
            Mail::to($email)->send(new OTPMail($otp));
            User::where('email', '=', $email)->update(['otp' => $otp]);
            return response()->json(['status' => 'success', 'message' => '4 digit otp code has been send tp your email.']);

        }else {
            return response()->json([
                'status' => 'Fail',
                 'message' =>'Invalid Email address'
            ]);
        }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Fail',
                 'message' => $e->getMessage()
            ]);
        }
       
    }
  public function varifyOtp(Request $request){

        try {
            /// validation:
            $request->validate([
                'email'=>'required|string|email|max:50', 
                'otp'=>'required|string|min:4'
            ]);


            $email = $request->input('email');
            $otp = $request->input('otp');
            //cheacking:
            $user = User::where('email','=',$email)->where('otp','=',$otp)->first(); 


            // condition:
            // Hash::check('plainText' , 'hashText'); -> to understand
            if (!$user) {
                return response()->json(['status' => 'Fail', 'message' => 'Invalid OTP']);
            }


            User::where('email', '=', $email)->update(['otp' => '0']);
            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'OTP varification Successful' , 'token'=> $token]);



        } catch (Exception $e) {
            return response()->json(['status' => 'Fail', 'message' => $e->getMessage()]);
        }
        

    }


     public function reset(Request $request){
          try {
            // validation
            $request->validate([
               'password'=>'required|string|min:4'
               
            ]);
            $id = Auth::id();
            $password = $request->input('password');
            // create user 
            User::where('id','=',$id)->update(['password' =>Hash::make($password) ]);

            return response()->json(['status' => 'success', 'message' => 'Password update successfully.']);

        } catch (Exception $e) {
            return response()->json(['status' => 'Fail', 'message' => $e->getMessage()]);
        }
    }
}
