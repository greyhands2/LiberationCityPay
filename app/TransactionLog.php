<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $fillable = [
      'user_id',
      'transaction_reference',
      'amount',
      'payment_type_id',
      'response_code',
      'response_description',
      'response_full'
    ];

    public function user(){
        return static::hasOne(User::class,'id','user_id');
    }


}
