<?php
    namespace App\Http\Controllers;
    class WildCard1 {
        public $pre_payment_details;




        public $bytes;

        public $transaction_reference;

        public function __construct(){
            $this->bytes = random_bytes(5);
            $this->transaction_reference = bin2hex($this->bytes);
            $this->pre_payment_details =
                ['product_id' => '6205',
                    'pay_item_id' => '101',
                    'amount' => '',
                    'currency' => '566',
                    'site_redirect_url' => url('/givingLog'),
                    'transaction_reference' => $this->transaction_reference,
                    'cust_id' => '',
                    'site_name' => url('/'),
                    'cust_name' => '',
                    'hash' => ''

                ];

        }

    }

?>
