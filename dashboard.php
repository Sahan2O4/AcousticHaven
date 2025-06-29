<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css?v=<?= time() ?>">

</head>
<body>

<div class="dashboard-container">
    <h1>🎵 Acoustic Haven Admin Dashboard</h1>
    <p style="font-weight: bold; font-size: 20px;">Welcome!</p>


    <div class="admin-options">
        <a href="sales_report.php">📊 View Sales Report</a>

        <a href="add_product.php">➕ Add Product</a>
        <a href="remove_product.php">🗑️ Remove Product</a>
        <a href="contact_messages.php">📬 View Contact Messages</a>
        <a href="order_report.php" class="dashboard-button">📦 View Orders</a>


       
        <a href="logout.php">🚪 Logout</a>
    </div>
</div>

</body>
</html>

