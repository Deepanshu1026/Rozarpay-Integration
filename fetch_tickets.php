<?php
session_start();
include 'config/db.php';

// Check if the user is logged in
if (!isset($_SESSION['id'])) {
    http_response_code(403);
    echo json_encode(["error" => "Unauthorized access."]);
    exit;
}

$user_id = $_SESSION['id']; // Retrieve user ID from session

// Fetch tickets for the logged-in user
$sql = "SELECT * FROM payments WHERE user_id = '$user_id'";
$result = $conn->query($sql);

$tickets = [];
if ($result->num_rows > 0) {
    while ($ticket = $result->fetch_assoc()) {
        $tickets[] = [
            "event_name" => htmlspecialchars($ticket['event_name'], ENT_QUOTES, 'UTF-8'),
            "amount" => htmlspecialchars($ticket['amount'], ENT_QUOTES, 'UTF-8'),
            "razorpay_payment_id" => htmlspecialchars($ticket['razorpay_payment_id'], ENT_QUOTES, 'UTF-8'),
            "currency" => htmlspecialchars($ticket['currency'], ENT_QUOTES, 'UTF-8'),
            "payment_status" => htmlspecialchars($ticket['payment_status'], ENT_QUOTES, 'UTF-8'),
        ];
    }
}

echo json_encode($tickets);
