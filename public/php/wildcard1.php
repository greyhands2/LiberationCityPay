 <?php
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
'amount' => '10000',
'currency' => '566',
'site_redirect_url' => 'http://localhost/PayMiddleware/redirectPage.php',
'transac_ref' => $this->transac_ref, 
'cust_id' => '000001',
'site_name' => 'http://localhost/PayMiddleware/index.php',
'cust_name' => 'osas',
'hash' => ''

];

}

}

?>