<?php
    /**
     * Created by PhpStorm.
     * User: UniQue
     * Date: 12/12/2017
     * Time: 2:55 PM
     */

// namespace App\Services;



// use App\AdminProfile;
// use Exception;
    
    namespace App\Http\Controllers;
    
    
    class InterswitchConfig
    {
        
        
        
        
        public $web_pay_request_test_url     = 'https://sandbox.interswitchng.com/webpay/pay';
        
        public  $web_pay_test_query_url      = 'https://sandbox.interswitchng.com/webpay/api/v1/gettransaction.json';
        
        public $web_pay_request_live_url     = '';
        
        public $web_pay_query_live_url       = '';
        
        public $pay_direct_request_test_url  = 'https://sandbox.interswitchng.com/collections/w/pay';
        
        public $pay_direct_query_test_url    = 'https://sandbox.interswitchng.com/collections/api/v1/gettransaction.json';
        
        public $pay_direct_request_live_url  = 'https://webpay.interswitchng.com/paydirect/pay';
        
        public $pay_direct_live_query_url    = 'https://webpay.interswitchng.com/paydirect/api/v1/gettransaction.json';
        
        
        
        public $mac_key                      = 'D3D1D05AFE42AD50818167EAC73C109168A0F108F32645C8B59E897FA930DA44F9230910DAC9E20641823799A107A02068F7BC0F4CC41D2952E249552255710F';
        
        public $txnRef;
        
        public $amount;
        
        public $pay_item_id;
        
        public $product_id;
        public $cust_id;
        public $cust_name;
        public $redirectUrl;
        public $hash;
        
        
        
        public function __construct($product_id, $pay_item_id, $amount, $transac_ref, $cust_id, $cust_name, $redirectUrl){
            
            $this->requestActionUrl = $this->web_pay_request_test_url;
            $this->queryActionUrl   = $this->web_pay_test_query_url;
            $this->item_id = $pay_item_id;
            $this->product_id = $product_id;
            $this->cust_name = $cust_name;
            $this->cust_id = $cust_id;
            $this->amount = $amount;
            $this->txnRef = $transac_ref;
            $this->redirectUrl = $redirectUrl;
            
        }
        
        public function queryHash(){
            $toHash = $this->product_id.$this->txnRef.$this->mac_key;
            return openssl_digest($toHash, "SHA512");
        }
        
        // public function transactionHash($txnRef,$amount,$redirectUrl){
        //     $info = [
        //         'reference'  => $txnRef,
        //         'user_id'        => auth()->user()->id,
        //         'profile'        => AdminProfile::getUserInfo(auth()->user()->id),
        //         'amount'         => $amount,
        //         'gateway_id'     => 1,
        //         'payment_status' => 0
        //     ];
        //     PortalCustomNotificationHandler::interswitchPrepayment($info); //*frowns*
        
        //     $toHash = $txnRef.$this->product_id.$this->item_id.$amount.$redirectUrl.$this->mac_key;
        //     return openssl_digest($toHash, "SHA512");
        // }
        
        public function cheatTransactionHash(){ //*smiles*
            
            
            $dhash = $this->txnRef.$this->product_id.$this->item_id.$this->amount.$this->redirectUrl.$this->mac_key;
            
            
            $this->hash = openssl_digest($dhash, "SHA512");
            return $this->hash;
            
        }
        
        
        
        
        
        public function requery(){
            
            $headers = array(
                "GET /HTTP/1.1",
                "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.0.1) Gecko/2008070208 Firefox/3.0.1",
                "Accept-Language: en-us,en;q=0.5",
                "Keep-Alive: 300",
                "Connection: keep-alive",
                "Hash:" . $this->queryHash() );
            
            $url = $this->queryActionUrl.'?productid='.$this->product_id.'&transactionreference='.$this->txnRef.'&amount='.$this->amount;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION ,1);
            curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
            curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT ,120);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER ,false);
            curl_setopt($ch, CURLOPT_TIMEOUT, 120);
            $response  = curl_exec($ch);
            curl_close($ch);
            return $this->queryValidator($this->txnRef,$response);
            
        }
        
        public function queryValidator($txnRef,$response){
            if(empty($response)){
                return [
                    'reference' => $txnRef,
                    'status' => 0,
                    'responseCode' => '--',
                    'responseDescription' => 'Could not confirm payment status. Bad Internet Connection',
                    'responseFull' => '0',
                    'amount' => '0'
                ];
            }else{
                $response  = json_decode($response);
                $responseCode = $response->ResponseCode;
                $amount = $response->Amount;
                if(($responseCode == "00" || $responseCode == "11" || $responseCode == "10")){
                    $status = 1;
                }else{
                    $status = 0;
                }
                $responseDescription = $response->ResponseDescription;
                return [
                    'reference' => $txnRef,
                    'status' => $status,
                    'responseCode' => $responseCode,
                    'responseDescription' => $responseDescription,
                    'responseFull' => json_encode($response,true),
                    'amount' => $amount
                ];
            }
        }
        
        
        
    }

?>