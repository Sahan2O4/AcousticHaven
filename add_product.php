<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.html");
    exit();
}

$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $price = $_POST['price'];

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $upload_dir = "uploads/";
    $target = $upload_dir . basename($image);

    if (move_uploaded_file($tmp, $target)) {
        $stmt = $conn->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssds", $name, $desc, $price, $image);
        $stmt->execute();
        $msg = "✅ Product added successfully!";
    } else {
        $msg = "❌ Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="add_product.css?v=<?= time() ?>">

</head>
<body>
<div class="form-container">
    <h2>➕ Add New Product</h2>
    <?php if (isset($msg)) echo "<p class='message'>$msg</p>"; ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description" required></textarea>
        <input type="number" step="0.01" name="price" placeholder="Price (Rs.)" required>
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" value="Add Product">
    </form>
    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>
