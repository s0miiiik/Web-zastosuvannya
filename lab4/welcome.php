<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
<h1>Ласкаво просимо, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
<a href="logout.php">Вийти</a>
