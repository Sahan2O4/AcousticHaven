\<?php

$servername = "localhost";
$db_username = "root";
$db_password = "";
$db_name = "acoustic_haven";

$conn = new mysqli("localhost:3306","root","","acoustichaven");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = htmlspecialchars(trim($_POST['username']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $contact = htmlspecialchars(trim($_POST['contact']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    
    if (empty($username) || empty($email) || empty($contact) || empty($_POST['password'])) {
        echo "All fields are required.";
        exit;
    }

    
    $stmt = $conn->prepare("INSERT INTO users (username, email, contact, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $email, $contact, $password);

    
    if ($stmt->execute()) {
        
        header("Location: Login.html");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    
    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
