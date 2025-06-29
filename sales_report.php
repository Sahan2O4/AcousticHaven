<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit();
}

$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");

// Total products sold
$sales_query = "
SELECT product_name, COUNT(*) AS total_orders, SUM(price) AS total_earned
FROM orders
GROUP BY product_name
";
$sales_result = $conn->query($sales_query);

// Customer details per product
$customers_query = "
SELECT product_name, customer_email, price, order_date
FROM orders
ORDER BY product_name, customer_email
";
$customers_result = $conn->query($customers_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sales Report</title>
  <link rel="stylesheet" href="sales_report.css?v=<?= time() ?>">



</head>
<body>

<div class="dashboard-container">
  <h1>📈 Sales Overview</h1>

  <h2>Total Orders per Product</h2>
  <table>
    <tr><th>Product</th><th>Orders</th><th>Total Revenue</th></tr>
    <?php while ($row = $sales_result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['product_name']) ?></td>
        <td><?= (int)$row['total_orders'] ?></td>
        <td>Rs. <?= number_format($row['total_earned'], 2) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <h2>Customer Purchase Details</h2>
  <table>
    <tr><th>Product</th><th>Email</th><th>Price</th><th>Date</th></tr>
    <?php while ($row = $customers_result->fetch_assoc()): ?>
      <tr>
        <td><?= htmlspecialchars($row['product_name']) ?></td>
        <td><?= htmlspecialchars($row['customer_email']) ?></td>
        <td>Rs. <?= number_format($row['price'], 2) ?></td>
        <td><?= htmlspecialchars($row['order_date']) ?></td>
      </tr>
    <?php endwhile; ?>
  </table>

  <a href="dashboard.php" style="color: white; display: inline-block; margin-top: 20px;">⬅ Back to Dashboard</a>
</div>

</body>
</html>
