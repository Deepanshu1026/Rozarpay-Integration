<?php include 'config/db.php'; ?>

<?php
$mobile = $_GET['mobile'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp = $_POST['otp'];
    $check = $conn->query("SELECT * FROM users WHERE mobile = '$mobile' AND otp = '$otp'");
    if ($check->num_rows == 1) {
        $conn->query("UPDATE users SET is_verified = 1 WHERE mobile = '$mobile'");
        echo "Verified successfully. <a href='login.php'>Login</a>";
    } else {
        echo "Invalid OTP.";
    }
}
?>

<form method="post">
    <input type="text" name="otp" placeholder="Enter OTP"><br>
    <button type="submit">Verify</button>
</form>
