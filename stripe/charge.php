<?php
require_once("./dbconnection.php");
require_once('./stripe/config.php');


  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source'  => $token
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount'   => $_POST['amount'],
    'currency' => 'usd'
));

if (is_object($charge)) {
	$appointment_id = $_POST['appointment_id'];
	$amount = $charge->amount;
	$balance_transaction = $charge->balance_transaction;
	$currency = $charge->currency;
	$patient_id = $_POST['patient_id'];
	$name = $charge->source->name;
	$status = mysql_query("insert into payment_log (appointment_id,amount,transaction_id,currency,patient_id,patient_email) values ($appointment_id,$amount,'$balance_transaction','$currency','$patient_id','$name')");
	if ($status) {
		mysql_query("update appointment set status=3 where appointid=$appointment_id");
	}
}

header("Location: http://localhost/1402/appointmenttaken.php");
// echo '<pre>';
// print_r($charge);
?>