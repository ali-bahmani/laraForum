<?php

namespace App\Http\Controllers\Api\V01\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){

        // validation user
        $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'password' => ['required','min:8']
        ]);

        // create new user
        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ]);

        //return $user;

        $superAdminEmail = config('permission.default_super_admin');

        $user->email == $superAdminEmail ? $user->assignRole('Super Admin') : $user->assignRole('User');
            // if($user->email == $superAdminEmail){
            //     $user->assignRole('Super Admin');
            //     $user->assignRole('Super Admin');
            // }else{
            //     $user->assignRole('User');
            // }

        return response()->json([
            'message' => 'New user created successfully'
        ], 201);

    }

    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json(Auth::user(), 200);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'User logout successfully'
        ], 200);
    }

    public function user(){
        return response()->json(Auth::user(), 200);
    }
}
