<?php
session_start();
session_unset();
session_destroy();

// Prevent back navigation caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 1 Jan 2000 00:00:00 GMT");

// Redirect to login page (same folder)
header("Location: admin_login.html");
exit();
?>
