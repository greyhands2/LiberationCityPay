<?php

//assumed variables containing user info for the hidden form
require('inst_obj.php');

session_start();


//get the form hash key from a function
$tp = $hh->getHash();
require_once("InterswitchConfig.php");
$tr = $tp['arr']['serialized_obj']; // save serialized object of Interswitch class returned from wildcard into a variable

 $_SESSION['payload'] = $tr; // assign the serialized object of class into a session
 
print_r($tr);

?>

<!doctype html>
<html>
	<head>
		


	</head>

	<body>
		
		<div>
			<form id="myForm" method="post" name="form1" action="<?= $tp['url']; ?>">
        <!-- REQUIRED HIDDEN FIELDS -->
        <!-- <input name="email" id="email" type="text" class="" placeholder="" required> -->
        <input name="product_id" id="product_id"  type="hidden" value="<?= $tp['arr']['product_id']; ?>" />
        <input name="pay_item_id" id="pay_item_id"  type="hidden" value="<?= $tp['arr']['pay_item_id']; ?>" />
        <input name="amount" id="amount"  type="hidden" value="<?= $tp['arr']['amount']; ?>" />
        <input name="currency" id="currency"  type="hidden" value="<?= $tp['arr']['currency']; ?>" />
        <input name="site_redirect_url" id="site_redirect_url"  type="hidden" value="<?= $tp['arr']['site_redirect_url']; ?>"/>
        <input name="txn_ref" type="hidden" id="trans_ref"  value="<?= $tp['arr']['transac_ref']; ?>" />
        <input name="cust_id" type="hidden" id="cust_id"  value="<?= $tp['arr']['cust_id']; ?>"/>
        <input name="site_name" type="hidden" id="site_name"  value="<?= $tp['arr']['site_name']; ?>"/>
        <input name="cust_name" type="hidden" id="cust_name"  value="<?= $tp['arr']['cust_name']; ?>" />
        <input name="hash" type="hidden" id="hash"  value="<?= $tp['arr']['hash']; ?>" />
        </br></br>
        <input type="submit" id="submit"  value="PAY NOW"></input>
    </form>


<script type="text/javascript" src="static/scripts/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="static/scripts/prepay.js"></script>

		</div>



	</body>

	<footer>
		

	</footer>












</html>
