<?php

// Include Mercadopago library
require_once "mercadopago.php";

// Create an instance with your MercadoPago credentials (CLIENT_ID and CLIENT_SECRET): 
$mp = new MP("CLIENT_ID", "CLIENT_SECRET");

// Get the payment information 
$payment_info = $mp->get_payment_info($_GET["id"]);

// Show payment information
if ($payment_info["status"] == 200 && $payment_info["response"]["collection"]["status"] == 'approved') {
    print_r($payment_info["response"]);
}
?>
