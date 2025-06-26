<?php
require_once __DIR__ . '/config/razorpay.php';
require_once __DIR__ . '/includes/functions.php';

session_start();

// Get form data
$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$phone = $_POST['phone'] ?? '';
$eventId = $_POST['event_id'] ?? 0;
$tickets = $_POST['tickets'] ?? 1;

// Validate input
if (empty($name) || empty($email) || empty($phone) || $eventId <= 0) {
    die("Invalid request");
}

// Get event details
$event = getEventById($eventId);
if (!$event) {
    die("Event not found");
}

// Calculate amount (in paise)
$amount = $event['price'] * $tickets * 100;

// Create Razorpay order
try {
    $order = $api->order->create([
        'amount' => $amount,
        'currency' => 'INR',
        'receipt' => 'order_rcpt_' . time(),
        'payment_capture' => 1 // Auto-capture payment
    ]);

    // Store booking in database (status = pending)
    $_SESSION['booking_data'] = [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'event_id' => $eventId,
        'tickets' => $tickets,
        'amount' => $amount / 100, // Convert back to INR
        'rzp_order_id' => $order->id
    ];

    // Return order ID to frontend
    echo json_encode([
        'success' => true,
        'order_id' => $order->id,
        'amount' => $amount,
        'name' => $name,
        'email' => $email,
        'phone' => $phone
    ]);

} catch (Exception $e) {
    echo json_encode([
        'success' => false,
        'error' => $e->getMessage()
    ]);
}
?>