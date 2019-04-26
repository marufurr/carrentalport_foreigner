<?php
include('includes/config.php');
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
	$booking_id = $_POST['booking_id'];
	$amount = $charge->amount;
	$balance_transaction = $charge->balance_transaction;
	$currency = $charge->currency;
	$user_email = $_POST['user_email'];
	$name = $charge->source->name;
	$link = $dbh->prepare("insert into payment_log (booking_id,amount,transaction_id,currency,user_email) values (:booking_id,:amount,:transaction_id,:currency,:user_email)");
	$link->execute([
		":booking_id" => $booking_id,
		":amount" => $amount,
		":transaction_id" => $balance_transaction,
		":currency" => $currency,
		":user_email" => $user_email,
	]);
	$link = $dbh->prepare("update tblbooking set Status=3 where id=:booking_id");
	$link->execute([
		":booking_id" => $booking_id,
	]);
}

header("Location: http://localhost/carrentalproject/carrental/my-booking.php");
// echo '<pre>';
// print_r($charge);
?>