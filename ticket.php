<?php 
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f9f9f9;
        }

        .hero-section {
            background: url('assets/images/tickets-banner.jpg') no-repeat center center/cover;
            height: 300px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            text-align: center;
            position: relative;
        }

        .hero-section::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            z-index: 2;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.2);
        }

        .card-body h5 {
            font-weight: 600;
            color: #333;
        }

        .card-body p {
            color: #555;
        }

        .alert-info {
            background-color: #e9f7fc;
            color: #31708f;
        }
    </style>
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <!-- Hero Section -->
    <section class="hero-section">
        <h1>My Tickets</h1>
    </section>

    <!-- Tickets Section -->
    <div class="container my-5">
        <div id="ticket-container" class="row">
            <!-- Tickets will be dynamically loaded here -->
        </div>
        <div id="no-tickets-message" class="alert alert-info text-center d-none">You have no tickets.</div>
    </div>

    <script>
        $(document).ready(function () {
            $.ajax({
                url: 'fetch_tickets.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    if (data.length > 0) {
                        let ticketHTML = '';
                        data.forEach(ticket => {
                            ticketHTML += `
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">${ticket.event_name}</h5>
                                            <p class="card-text">Amount Paid: ₹${ticket.amount}</p>
                                            <p class="card-text">Payment ID: ${ticket.razorpay_payment_id}</p>
                                            <p class="card-text">Currency: ${ticket.currency}</p>
                                            <p class="card-text">Status: ${ticket.payment_status}</p>
                                        </div>
                                    </div>
                                </div>
                            `;
                        });
                        $('#ticket-container').html(ticketHTML);
                    } else {
                        $('#no-tickets-message').removeClass('d-none');
                    }
                },
                error: function () {
                    alert('Failed to fetch ticket details. Please try again.');
                }
            });
        });
    </script>
</body>
</html>
