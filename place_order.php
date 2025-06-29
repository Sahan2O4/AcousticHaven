<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "acoustic_haven";

$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$data = json_decode(file_get_contents("php://input"), true);

$email = $conn->real_escape_string($data["email"]);
$address = $conn->real_escape_string($data["address"]);
$cart = $data["cart"];

foreach ($cart as $item) {
    $name = $conn->real_escape_string($item["name"]);
    $price = floatval($item["price"]);

    $sql = "INSERT INTO orders (customer_email, address, product_name, price)
            VALUES ('$email', '$address', '$name', $price)";
    $conn->query($sql);
}

echo "Order placed successfully!";
$conn->close();
?>
