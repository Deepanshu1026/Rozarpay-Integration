<?php
// DB connection
include 'config/db.php';
session_start(); 
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;

// Get POST data
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['razorpay_payment_id'])) {
    $paymentId = $conn->real_escape_string($data['razorpay_payment_id']);
    $name = $conn->real_escape_string($data['name']);
    $email = $conn->real_escape_string($data['email']);
    $amount = (float)$data['amount'];
    $currency = $conn->real_escape_string($data['currency']);
    $eventName = $conn->real_escape_string($data['event_name']);

    $sql = "INSERT INTO payments 
            (razorpay_payment_id, name, email, amount, currency, event_name, payment_status,user_id)
            VALUES 
            ('$paymentId', '$name', '$email', $amount, '$currency', '$eventName', 'success', '$userId')";

    if ($conn->query($sql) === TRUE) {
        http_response_code(200);
        echo json_encode(["message" => "Payment recorded."]);
    } else {
        http_response_code(500);
        echo json_encode(["error" => "Failed to store payment."]);
    }
}
?>
