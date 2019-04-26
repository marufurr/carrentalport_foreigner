<?php
require_once('vendor/autoload.php');

$stripe = array(
  "secret_key"      => "sk_test_6NsmCDSPi0DytBG2RzuQtppm",
  "publishable_key" => "pk_test_dNFsOCzWu90gAGUWRGGJOmR0"
);

\Stripe\Stripe::setApiKey($stripe['secret_key']);
?>