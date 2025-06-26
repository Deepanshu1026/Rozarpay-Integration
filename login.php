<?php include 'config/db.php'; session_start(); ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $password = $_POST['password']; // Compare plain text password

    $res = $conn->query("SELECT * FROM users WHERE mobile = '$mobile'");
    if ($res->num_rows == 1) {
        $row = $res->fetch_assoc();
        if ($password === $row['password']) { // Direct comparison
            $_SESSION['user'] = $row['name'];
            $_SESSION['id'] = $row['id']; // Store user ID in session
            header("Location: index.php");
            exit;
        } else {
            echo "<div class='alert alert-danger text-center'>Incorrect password.</div>";
        }
    } else {
        echo "<div class='alert alert-danger text-center'>Mobile not registered.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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

        .login-form {
            width: 100%;
            max-width: 450px;
            background-color: #ffffff;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
            padding: 2rem;
        }

        .login-form h3 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .btn-login {
            background: linear-gradient(to right, #00b09b, #96c93d);
            border: none;
            font-weight: 600;
            font-size: 16px;
        }

        .btn-login:hover {
            background: linear-gradient(to right, #00a389, #7ab936);
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Left Side (Image + Overlay Text) -->
        <div class="col-md-6 d-none d-md-block left-side">
            <div class="left-overlay">
                <div>
                    <h1>Welcome Back!</h1>
                    <p class="mt-3">Login to access your account and book your favorite events.</p>
                </div>
            </div>
        </div>

        <!-- Right Side (Form) -->
        <div class="col-md-6 form-container">
            <div class="login-form mx-auto">
                <h3>🔑 Login</h3>
                <form method="post">
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required placeholder="Enter your mobile number">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="Enter your password">
                    </div>
                    <button type="submit" class="btn btn-login w-100 mt-3">Login</button>
                </form>
                <p class="text-center mt-3">
                    Don't have an account? <a href="register.php" class="text-primary">Register here</a>
                </p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
