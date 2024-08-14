<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['customer_id'])) {
    header('Location: login.php');
    exit;
}

// Access session variables
$customer_id = $_SESSION['customer_id'];
$customer_email = $_SESSION['customer_email'];
$customer_name = $_SESSION['customer_name'];

// Display session data
echo "Logged in as: $customer_name ($customer_email)";
?>
