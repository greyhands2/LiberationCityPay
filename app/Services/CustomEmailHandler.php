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
        $user = [
            'email' => 'ogunsakin191@gmail.com',
            'name' => 'Ogunsakin Damilola'
        ];
        Mail::to($user['email'])->send(new SuccessfulRegistration($user));
    }

    public static function PaymentNotification($user,$data){
        $user = [
            'email' => 'ogunsakin191@gmail.com',
            'name' => 'Ogunsakin Damilola'
        ];
        Mail::to($user['email'])->send(new PrePaymentNofication($user,$data));
    }

    public static function PaymentFailed($user,$data){
        $user = [
            'email' => 'ogunsakin191@gmail.com',
            'name' => 'Ogunsakin Damilola'
        ];
        Mail::to($user['email'])->send(new PaymentFailed($user, $data));
    }

    public static function PaymentSuccessful($user, $data){
        $user = [
            'email' => 'ogunsakin191@gmail.com',
            'name' => 'Ogunsakin Damilola'
        ];
        Mail::to($user['email'])->send(new PaymentSuccessful($user, $data));
    }



}
