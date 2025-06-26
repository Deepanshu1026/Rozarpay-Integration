
<?php 
include 'config/db.php';
session_start(); 
$user_id = isset($_SESSION['id']) ? $_SESSION['id'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Book Event Ticket</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      margin: 0;
      padding: 0;
      height: 100vh;
      overflow: hidden;
      font-family: 'Segoe UI', sans-serif;
    }

    .container-fluid {
      height: 100vh;
    }

    .left-side {
      background: url('assets/images/epic.jpg') no-repeat center center/cover;
      filter: brightness(0.85);
      position: relative;
    }

    .left-overlay {
      position: absolute;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      backdrop-filter: blur(2px);
      background: rgba(0, 0, 0, 0.4);
      color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      padding: 2rem;
    }

    .left-overlay h1 {
      font-size: 2.8rem;
      font-weight: 700;
    }

    .form-container {
      display: flex;
      align-items: center;
      height: 100vh;
      padding: 2rem;
    }

    .booking-form {
      width: 100%;
      max-width: 450px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      padding: 2rem;
    }

    .booking-form h3 {
      font-weight: 700;
      margin-bottom: 1.5rem;
    }

    .btn-pay {
      background: linear-gradient(to right, #00b09b, #96c93d);
      border: none;
      font-weight: 600;
      font-size: 16px;
    }

    .btn-pay:hover {
      background: linear-gradient(to right, #00a389, #7ab936);
    }
  </style>
</head>
<body>

<?php
$price = isset($_GET['price']) && is_numeric($_GET['price']) ? (float) $_GET['price'] : 0;
?>

<div class="container-fluid">
  <div class="row">
    
    <!-- Left Side (Image + Overlay Text) -->
    <div class="col-md-6 d-none d-md-block left-side">
      <div class="left-overlay">
        <div>
          <h1>Experience the Event of a Lifetime</h1>
          <p class="mt-3">Secure your seat now for an unforgettable experience. Fast, easy, and secure booking.</p>
        </div>
      </div>
    </div>

    <!-- Right Side (Form) -->
    <div class="col-md-6 form-container">
      <div class="booking-form mx-auto">
        <h3>🎟️ Book Your Ticket</h3>
        <form id="paymentForm">
          <div class="mb-3">
            <label for="name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="name" placeholder="John Wick" required />
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="you@example.com" required />
          </div>
          <div class="mb-3">
            <label for="amount" class="form-label">Amount (in ₹)</label>
            <input type="number" class="form-control" id="amount" value="<?php echo $price; ?>" readonly />
          </div>
          <button type="button" class="btn btn-pay w-100 mt-3" onclick="payNow()">Pay Now</button>
        </form>
      </div>
    </div>

  </div>
</div>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
  function payNow() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const amount = document.getElementById("amount").value * 100;

    if (!name || !email || !amount) {
      alert("Please fill all fields.");
      return;
    }

    const options = {
      key: "rzp_test_aE1ssMlQXiF6eD", // Replace with your Razorpay key
      amount: amount,
      currency: "INR",
      name: "Event Booking",
      description: "Ticket Booking Payment",
      prefill: {
        name: name,
        email: email
      },
      handler: function (response) {
        fetch("store_payment.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({
            razorpay_payment_id: response.razorpay_payment_id,
            name: name,
            email: email,
            amount: amount / 100,
            currency: "INR",
            event_name: "Event Booking"
          })
        }).then(() => {
          // window.location.href="ticket.php"; // Redirect to ticket page
          window.location.href = "sucess.php?name=" + name + "&email=" + email + "&amount=" + amount / 100;
        });
      },
      modal: {
        ondismiss: function () {
          alert("Payment cancelled.");
          window.location.href = "failed.php?name=" + name + "&email=" + email + "&amount=" + amount / 100;
        }
      }
    };

    const rzp = new Razorpay(options);
    rzp.open();
  }
</script>

</body>
</html>
