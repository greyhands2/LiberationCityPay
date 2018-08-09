<?php
/**
 * Created by PhpStorm.
 * User: UniQue
 * Date: 8/6/2018
 * Time: 11:28 AM
 */
namespace App\Services;

use App\Mail\PaymentFailed;
use App\Mail\PaymentSuccessful;
use App\Mail\PrePaymentNofication;
use App\Mail\SuccessfulRegistration;
use Illuminate\Support\Facades\Mail;

class CustomEmailHandler
{

    public static function successfulRegistrationEmail($user){
        try{
            Mail::to($user['email'])->send(new SuccessfulRegistration($user));
        }catch( \Exception $e){
            dd($e);
        }
        return true;
    }

    public static function PaymentNotification($user,$data){
        try{
            Mail::to($user['email'])->send(new PrePaymentNofication($user,$data));
        }catch( \Exception $e){
        }
        return true;
    }

    public static function PaymentFailed($user,$data){
        try{
            Mail::to($user['email'])->send(new PaymentFailed($user, $data));
        }catch( \Exception $e){
        }
        return true;
    }

    public static function PaymentSuccessful($user, $data){
        try{
            Mail::to($user['email'])->send(new PaymentSuccessful($user, $data));
        }catch( \Exception $e){
        }
        return true;
    }



}
