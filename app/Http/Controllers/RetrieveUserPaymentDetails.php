<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveUserPaymentDetails extends Controller
{
    //
    
    
    public function index(Request $request){
        
        
        return json_decode($request);
        
//        $rules = ['name' => 'required|string|max:255',
//
//
//
//
//
//
//
//
//
//
//
//
//
//        ];
//        return view('payment')->with(['userPayDetails' => $formData]);
//
        
        
    }
}
