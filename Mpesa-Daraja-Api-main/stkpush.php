<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the values of the form fields
  $stktotal = $_POST["route_step_cost"];
  $txtmpesa = $_POST["contact"];
  //print_r($txtmpesa);
//INCLUDE THE ACCESS TOKEN FILE
include 'accessToken.php';
date_default_timezone_set('Africa/Nairobi');
$processrequestUrl = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';
$callbackurl = 'https://37dc-105-161-202-36.ngrok-free.app/SimpleBusTicket-PHP/Mpesa-Daraja-Api-main/callback.php';
$passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
$BusinessShortCode = '174379';
$Timestamp = date('YmdHis');
// ENCRIPT  DATA TO GET PASSWORD
$Password = base64_encode($BusinessShortCode . $passkey . $Timestamp);
//$phone = '254715064980';//phone number to receive the stk push
$phone = $txtmpesa;
//$money = '1';
$money = $stktotal;
$PartyA = $phone;
$PartyB = '254708374149';
$AccountReference = 'GARICHAPCHAP';
$TransactionDesc = 'stkpush test';
$Amount = $money;
$stkpushheader = ['Content-Type:application/json', 'Authorization:Bearer ' . $access_token];
//INITIATE CURL
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $processrequestUrl);
curl_setopt($curl, CURLOPT_HTTPHEADER, $stkpushheader); //setting custom header
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'BusinessShortCode' => $BusinessShortCode,
  'Password' => $Password,
  'Timestamp' => $Timestamp,
  'TransactionType' => 'CustomerPayBillOnline',
  'Amount' => $Amount,
  'PartyA' => $PartyA,
  'PartyB' => $BusinessShortCode,
  'PhoneNumber' => $PartyA,
  'CallBackURL' => $callbackurl,
  'AccountReference' => $AccountReference,
  'TransactionDesc' => $TransactionDesc
);

$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
echo $curl_response = curl_exec($curl);
//ECHO  RESPONSE
$data = json_decode($curl_response);
$CheckoutRequestID = $data->CheckoutRequestID;
$ResponseCode = $data->ResponseCode;
if ($ResponseCode == "0") {
  echo "The CheckoutRequestID for this transaction is : " . $CheckoutRequestID;
}
echo '<script>alert("Payment Successful!");</script>';
}else{
  echo "error setting totals and phone number";}
  
    