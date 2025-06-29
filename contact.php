<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);



$conn = new mysqli("localhost:3306","root","","acoustichaven");


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $question = htmlspecialchars(trim($_POST["question"]));

    
    $stmt = $conn->prepare("INSERT INTO contact_messages (email, question) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $question);

    if ($stmt->execute()) {
        echo "✅ Your question has been received. We'll get back to you soon!";
    } else {
        echo "❌ Failed to submit your question. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>
