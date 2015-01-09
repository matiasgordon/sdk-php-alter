<?php

// Include Mercadopago library
require_once "lib/mercadopago.php";

$mp = new MP('CLIENT_ID', 'CLIENT_SECRET');

// Get the payment reported by the IPN.
$payment_info = $mp->get_payment_info($_GET["id"]);
var_dump($payment_info);


// Save payment information
if ($payment_info["status"] == 200) {
    echo "200 Ok";
	$resp = json_encode($payment_info["response"])."\n\n";
	file_put_contents('log-ipn.txt',$resp,FILE_APPEND|LOCK_EX);
}
?>