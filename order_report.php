<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit();
}

// Connect to DB
$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders
$sql = "SELECT customer_email, address, product_name, price, order_date FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>All Orders</title>
<style>
    body {
        font-family: "Segoe UI", sans-serif;
        background-color: #ffffff;
        color: #333;
        padding: 30px;
    }

    h1 {
        text-align: center;
        color: #1a237e;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    th, td {
        padding: 14px 16px;
        border: 1px solid #ccc;
        text-align: left;
    }

    th {
        background-color: #1a73e8; /* Google blue */
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e3f2fd;
    }
    
    .back-button {
    display: inline-block;
    background-color: #1a73e8;
    color: white;
    padding: 12px 20px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.back-button:hover {
    background-color: #155ab6;
}

</style>

</head>
<body>

    <h1>📦 Order Report</h1>

    <table>
        <tr>
            <th>Email</th>
            <th>Address</th>
            <th>Product</th>
            <th>Price (Rs.)</th>
            <th>Order Date</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['customer_email']) ?></td>
                    <td><?= nl2br(htmlspecialchars($row['address'])) ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= number_format($row['price']) ?></td>
                    <td><?= htmlspecialchars($row['order_date']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr><td colspan="5">No orders found.</td></tr>
        <?php endif; ?>
    </table>

    <div style="text-align: center; margin-top: 30px;">
    <a href="dashboard.php" class="back-button">⬅ Back to Dashboard</a>
</div>


</body>
</html>
