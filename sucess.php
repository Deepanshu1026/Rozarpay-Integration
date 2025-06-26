<?php
include 'includes/header.php';

// Get values from the URL
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8') : 'Guest';
$email = isset($_GET['email']) ? htmlspecialchars($_GET['email'], ENT_QUOTES, 'UTF-8') : 'Not Provided';
$amount = isset($_GET['amount']) ? (int)$_GET['amount'] : 0;
?>

<div class="container my-5">
  <div class="card shadow">
    <div class="card-header bg-success text-white text-center">
      <h3>Payment Successful 🎉</h3>
    </div>
    <div class="card-body">
      <p class="lead">Thank you, <strong><?php echo $name; ?></strong>! Your payment has been successfully received.</p>
      <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
        <li class="list-group-item"><strong>Amount Paid:</strong> ₹<?php echo number_format($amount); ?></li>
        <li class="list-group-item"><strong>Status:</strong> <span class="text-success">Confirmed</span></li>
      </ul>
      <a href="index.php" class="btn btn-primary">Back to Home</a>
    </div>
  </div>
</div>

<?php include 'includes/footer.php'; ?>
