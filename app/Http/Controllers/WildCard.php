<?php
    namespace App\Http\Controllers;
    use App\Http\Controllers\InterswitchConfig as InterswitchConfig;
    use App\Http\Controllers\Wildcard1 as Wildcard1;


    class Wildcard extends Controller {


        public $obj1;
        public $pre;
        public $save;
        public function __construct(){
            //instantiate wildcard1 class for retrieving array details
            $this->pre = new Wildcard1();
            // one and only instantiation of the InterswitchConfig class
            $this->obj1 = new InterswitchConfig($this->pre->pre_payment_details['product_id'], $this->pre->pre_payment_details['pay_item_id'], $this->pre->pre_payment_details['amount'], $this->pre->pre_payment_details['transaction_reference'], $this->pre->pre_payment_details['cust_id'], $this->pre->pre_payment_details['cust_name'], $this->pre->pre_payment_details['site_redirect_url'], $this->pre->pre_payment_details['hash']);
// serialize the class call object into a viarable save
            $this->save = serialize($this->obj1);



        }


        public function getHash(){ // function to get hash from InterswitchConfigClass
            //get the hash key
            $hashed_var = $this->obj1->cheatTransactionHash();
// save the hash key and the serialized object of class into the array
            $this->pre->pre_payment_details['hash'] = $hashed_var;
            $this->pre->pre_payment_details['serialized_obj'] = $this->save;

// $_SESSION['holder'] = ['arr' => $this->pre->pre_payment_details, 'url' => $this->obj1->requestActionUrl];
            //print_r($this->save);
//return to paymentPage a saved array containing hash key, saved instance and requestActionurl (from the interswitchconfigclass)
            return ['arr' => $this->pre->pre_payment_details, 'url' => $this->obj1->requestActionUrl];


        }

    }
?>
