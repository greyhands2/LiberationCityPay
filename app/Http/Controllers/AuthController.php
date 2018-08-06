<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $rules = ['name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed'];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => "Validation failed",
                'errors' => $validator->getMessageBag()
            ], 422);
        
        
        }
    
    
        $user = User::create(['name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
    
    
        if ($request->name == 'Libnation'){
            $user->attachRole(1);
    } else {
    
            $user->attachRole(2);
        }
return response()->json([$request->all()]);
}

}
