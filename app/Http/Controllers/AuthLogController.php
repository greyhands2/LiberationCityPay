<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthLogController extends Controller
{
    
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
        
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
    
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }
    
    public function login(Request $data)
    {
        
        $validator = Validator::make($data->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ]);
        
        if ($validator->failed()) {
            return response()->json([
                'status' => 101,
                'message' => "Input validation failed",
                'errors' => $validator->getMessageBag(),
                'data' => $data->all()
            ], 422);
        }
        
        
        
        if ($this->attemptLogin($data)) {
            $user = $this->guard()->user();
            $user->generateToken();
            
            return response()->json([
                'status' => 100,
                'message' => "User logged in to API",
                'data' => $user->toArray(),
            ], 200);
        }
        
        return response()->json([
            'status' => 101,
            'message' => "Invalid login credentials.",
            'errors' => [],
            'data' => $data->all()
        ], 422);
        
    }
    
}
