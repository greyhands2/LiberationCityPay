<?php
    namespace App\Http\Controllers;
    class WildCard1 {
        public $pre_payment_details;
        
        
        
        
        public $bytes;
        
        public $transac_ref;
        
        public function __construct(){
            $this->bytes = random_bytes(5);
            $this->transac_ref = bin2hex($this->bytes);
            $this->pre_payment_details =
                ['product_id' => '6205',
                    'pay_item_id' => '101',
                    'amount' => '',
                    'currency' => '566',
                    'site_redirect_url' => 'http://localhost:7000/givingLog',
                    'transac_ref' => $this->transac_ref,
                    'cust_id' => '',
                    'site_name' => 'http://localhost/PayMiddleware/index.php',
                    'cust_name' => '',
                    'hash' => ''
                
                ];
            
        }
        
    }

?>