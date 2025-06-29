<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin_login.html");
    exit();
}

$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];

    $getImage = $conn->prepare("SELECT image FROM products WHERE id = ?");
    $getImage->bind_param("i", $id);
    $getImage->execute();
    $imgResult = $getImage->get_result();
    if ($imgData = $imgResult->fetch_assoc()) {
        $imagePath = "../uploads/" . $imgData['image'];
        if (file_exists($imagePath)) {
            unlink($imagePath); // delete the image file
        }
    }

    // Delete product
    $delete = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete->bind_param("i", $id);
    $delete->execute();
    header("Location: remove_product.php?deleted=1");
    exit();
}

$result = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Remove Products</title>
    <link rel="stylesheet" href="remove_product.css?v=<?= time() ?>">

</head>
<body>
<div class="container">
    <h2>🗑️ Remove Products</h2>
    <?php if (isset($_GET['deleted'])): ?>
        <p class="msg">✅ Product deleted successfully.</p>
    <?php endif; ?>
    <div class="product-grid">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="product-card">
                <img src="uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>">

                <h3><?= htmlspecialchars($row['name']) ?></h3>
                <p>Rs. <?= number_format($row['price'], 2) ?></p>
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this product?')">Delete</a>
            </div>
        <?php endwhile; ?>
    </div>
    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>
