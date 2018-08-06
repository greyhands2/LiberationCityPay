<?php

require_once("InterswitchConfig.php");
session_start();


print_r(unserialize($_SESSION['payload'])->requery());
 // $transac_details = $_SESSION['hh']->obj1->requery();
 // print_r($transac_details);

 session_destroy();












?>

