<?php session_start(); ?>
<?php if (!isset($_SESSION['user'])) header("Location: login.php"); ?>

<h1>Welcome, <?= $_SESSION['user'] ?></h1>
<a href="logout.php">Logout</a>
