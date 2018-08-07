<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveUserPaymentDetails extends Controller
{
    //
    
    
    public function index(Request $request){
        
//        dd(auth()->guest());
        
        dd($request->all());
        return $request['amount'];
//        'user_id',
//      'transaction_reference',
//      'amount',
//      'response_code',
//      'response_description',
//      'response_full'
//
//        $rules = ['name' => 'required|string|max:255',
//            'email' => 'required|email|max:255|unique:users',
//            'password' => 'required|min:6|confirmed'];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//            return response()->json([
//                'message' => "Validation failed",
//                'errors' => $validator->getMessageBag()
//            ], 422);
//
//
//        }
//
//
//        $user = User::create(['name' => $request->name,
//            'email' => $request->email,
//            'password' => Hash::make($request->password)
//        ]);
//
//

        
        
    }
}
