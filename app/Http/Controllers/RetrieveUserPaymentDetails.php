<?php

namespace App\Http\Controllers;

use App\Services\CustomEmailHandler;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetrieveUserPaymentDetails extends Controller
{

    public function __construct(){
        $this->interswitch = session()->get('payload');
    }


    public function index(Request $request){
//        dd($request->all());
        if(auth()->guest()){
            $user = User::where('email',$request->email)->first();
            if($user != null) {
                Auth::loginUsingId($user->id);
            }else{
                $data = $request->all();
                $password = strtoupper(str_random(6));
                $data['password'] = $password;
                $user = User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'password' => bcrypt($data['password'])
                ]);
                $user->attachRole(2);
                CustomEmailHandler::successfulRegistrationEmail($data);
                Auth::loginUsingId($user->id);
            }
        }
        $user = auth()->user();
        dd($user,$request->all());

    }
}
