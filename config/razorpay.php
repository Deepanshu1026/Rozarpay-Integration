<?php
require __DIR__ . '/../vendor/autoload.php';

use Razorpay\Api\Api;

$keyId = 'rzp_test_aE1ssMlQXiF6eD';
$keySecret = 'eFz0W5YGFAy4Nthc9l76tNqF';

$api = new Api($keyId, $keySecret);
?>