<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $fillable = [
      'user_id',
      'transaction_reference',
      'amount',
      'response_code',
      'response_description',
      'response_full'
    ];
}
