<?php
// DB connection
$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select all products or filter by category if needed
$sql = "SELECT * FROM products";  // You can add WHERE category = 'something'
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        echo "<h3>" . htmlspecialchars($row['product_name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";
        echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
        // Add image if you store image paths
        echo "<img src='" . htmlspecialchars($row['uploads']) . "' alt='" . htmlspecialchars($row['product_name']) . "' />";
        echo "</div>";
    }
} else {
    echo "No products found.";
}

$conn->close();
?>
