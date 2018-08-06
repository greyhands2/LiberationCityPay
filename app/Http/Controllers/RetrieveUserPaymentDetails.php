<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RetrieveUserPaymentDetails extends Controller
{
    //
    
    
    public function index(Request $request){
        
        $formData = $request->input();
        return view('payment')->with(['userPayDetails' => $formData]);
        
        
        
    }
}
