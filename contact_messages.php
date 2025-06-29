<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: ../admin_login.html");
    exit();
}

$conn = new mysqli("localhost:3306", "root", "", "acoustichaven");


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['reply'], $_POST['msg_id'])) {
    $msg_id = $_POST['msg_id'];
    $reply = $_POST['reply'];
    $stmt = $conn->prepare("UPDATE contact_messages SET reply = ? WHERE id = ?");
    $stmt->bind_param("si", $reply, $msg_id);
    $stmt->execute();
}

// Fetch quesions
$messages = $conn->query("SELECT * FROM contact_messages ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Messages</title>
    <link rel="stylesheet" href="contact_messages.css?v=<?= time() ?>">

</head>
<body>
<div class="container">
    <h2>📩 Contact Messages</h2>

    <?php if ($messages->num_rows > 0): ?>
        <table>
            <tr>
                <th>Email</th>
                <th>Question</th>
                <th>Submitted</th>
                
            </tr>
            <?php while ($msg = $messages->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($msg['email']) ?></td>
                    <td><?= htmlspecialchars($msg['question']) ?></td>
                    <td><?= htmlspecialchars($msg['submitted_at']) ?></td>
                    
                    
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No messages found.</p>
    <?php endif; ?>

    <a href="dashboard.php">⬅ Back to Dashboard</a>
</div>
</body>
</html>
