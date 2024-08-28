<?php
session_start();
// Ensure no output is sent before this point
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css"> <!-- Ensure this path is correct -->
    <title>To-Do List App</title>
</head>
<body>
    <!-- Your content goes here -->
</body>
</html>
