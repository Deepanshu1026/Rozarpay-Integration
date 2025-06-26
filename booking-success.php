<?php
require 'vendor/autoload.php';

use Razorpay\Api\Api;

$input = json_decode(file_get_contents('php://input'), true);

// Your Razorpay credentials
$key = 'rzp_test_aE1ssMlQXiF6eD';
$secret = 'eFz0W5YGFAy4Nthc9l76tNqF';

$api = new Api($key, $secret);

$tickets = (int) $input['tickets'];
$amount = 999 * $tickets * 100; // Amount in paise

$order = $api->order->create([
    'receipt' => 'order_rcptid_' . rand(1000, 9999),
    'amount' => $amount,
    'currency' => 'INR'
]);

echo json_encode([
    'success' => true,
    'order_id' => $order->id,
    'amount' => $amount,
    'name' => $input['name'],
    'email' => $input['email'],
    'phone' => $input['phone']
]);
