<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Failed</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="alert alert-danger text-center">
      <h1>Payment Failed</h1>
      <p>Unfortunately, your payment could not be processed. Please try again.</p>
      <a href="book-ticket.php?price=<?php echo htmlspecialchars($_GET['amount'], ENT_QUOTES, 'UTF-8'); ?>" class="btn btn-primary">Retry Payment</a>
    </div>
  </div>
</body>
</html>
