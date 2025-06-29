<?php
session_start();

$servername = "localhost:3306";
$db_username = "root";
$db_password = "";
$db_name = "acoustic_haven";


$conn = new mysqli("localhost:3306","root","","acoustichaven");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
           
            header("Location: Acoustic.html");
            exit;
        } else {
            echo "❌ Incorrect password.";
        }
    } else {
        echo "❌ No user found with that email.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request.";
}
?>
