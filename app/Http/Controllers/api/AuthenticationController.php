<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
public function register(Request $request){

    $validator = Validator::make($request->all(), [
        'first_name' => 'required|string|max:255',
        'middle_name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'phone' => 'required|numeric',
        'email' => 'required|string|email|max:255',

    ]);


    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
   // Check if the email already exists in the users table
    if (User::where('email', $request->email)->exists()) {
        return response()->json([
            'status' => 400,
            'message' => 'You are already a registered user with this email address.',
        ], 400);
    }
    // Check if the phone already exists in the users table
    if (User::where('phone', $request->phone)->exists()) {
        return response()->json([
            'status' => 400,
            'message' => 'You are already a registered user with this phone number.',
        ], 400);
    }

    $user = User::create([
        'first_name' => $request->first_name,
        'middle_name' => $request->middle_name,
        'surname' => $request->surname,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt(rand(1000000, 9999999)),
        'user_type' => 'appuser',
    ]);

    $data['status'] = 200;
    $data['message'] = 'User created successfully';
    $data['user'] = $user;
    return response($data, 200);
}
public function login(Request $request)
{
    $validator = Validator::make($request->all(), [
        'phone' => 'required_without:email',
        'email' => 'required_without:phone',
    ]);

    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }

    // Check for email login
    if ($request->email) {
        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->otp = 1234;
            $user->is_login = 1;
            $user->save();
            $token = $user->createToken(Str::random(50));
            return response()->json([
                'status' => 200,
                'message' => 'Login Successfully',
                'token' => $token->accessToken,
                'user-details' =>$user,
            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Email not found',
            ], 400);
        }
    }

    // Check for phone login
    if ($request->phone) {
        $user = User::where('phone', $request->phone)->first();

        if ($user) {
            $user->otp = 1234;
            $user->is_login = 1;
            $user->save();
            $token = $user->createToken(Str::random(50));
            return response()->json([
                'status' => 200,
                'message' => 'Login Successfully',
                'token' => $token->accessToken,
                'user-details' =>$user,

            ], 200);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'Phone not found',
            ], 400);
        }
    }
}

public function otpVerification(Request $request){
    $validator = Validator::make($request->all(), [
        'phone' => 'required_without:email',
        'email' => 'required_without:phone',
        'otp' => 'required',
    ]);
    if ($validator->fails()) {
        return response()->json(['error' => $validator->errors()], 400);
    }
    if($request->email){
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if ($user->otp == $request->otp) {
                $user->is_otp_verified = 1;
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'OTP verified successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid OTP',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'User not found',
            ], 400);
        }
    }
    if($request->phone){
        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            if ($user->otp == $request->otp) {
                $user->is_otp_verified = 1;
                $user->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'OTP verified successfully',
                ], 200);
            } else {
                return response()->json([
                    'status' => 400,
                    'message' => 'Invalid OTP',
                ], 400);
            }
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'User not found',
            ], 400);
        }
    }

}

public function logout(Request $request)
{
    $user = Auth::user();
    $request->user()->token()->revoke();
    $user->is_login = 0;
    $user->save();

    return response()->json([
        'status' => 200,
        'message' => 'User Logout successfully',
    ], 200);
}

public function loginUserList(){
    $user = Auth::user();
    $loginUser = User::where('id', $user->id)->where('is_login', 1)->select('first_name','middle_name','surname','email')->first();
    $data['status'] = 200;
    $data['message'] = 'Login User list retrieved successfully';
    $data['login_users'] =  $loginUser ;
    return response()->json($data, 200);
}

public function registeredUserCount(){
   
    $registered_user_count = User::whereIn('user_type', ['appuser', 'staff'])->count();
    $data['status'] = 200;
    $data['message'] = 'Registered User Count';
    $data['registered_user_count'] =  $registered_user_count ;
    return response()->json($data, 200);
}

}









