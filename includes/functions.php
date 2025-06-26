<?php
require_once __DIR__ . '/../config/db.php';

function getEventById($eventId) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM events WHERE id = ?");
    $stmt->bind_param("i", $eventId);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function createOrder($userId, $eventId, $tickets, $amount, $rzpOrderId) {
    global $conn;
    $stmt = $conn->prepare("INSERT INTO bookings (user_id, event_id, tickets, amount, razorpay_order_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("iiids", $userId, $eventId, $tickets, $amount, $rzpOrderId);
    return $stmt->execute();
}

function updatePaymentStatus($rzpOrderId, $status) {
    global $conn;
    $stmt = $conn->prepare("UPDATE bookings SET payment_status = ? WHERE razorpay_order_id = ?");
    $stmt->bind_param("ss", $status, $rzpOrderId);
    return $stmt->execute();
}
?>