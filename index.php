<?php
// Include the configuration file for database connection
include 'includes/config.php';

// Start session management
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Fetch user tasks from the database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM tasks WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$tasks = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

// Close the database connection
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do List - Dashboard</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <div class="container">
        <h1>Welcome to Your To-Do List</h1>
        <a href="add_task.php">Add New Task</a>

        <h2>Your Tasks</h2>
        <?php if (count($tasks) > 0): ?>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <strong><?php echo htmlspecialchars($task['title']); ?></strong>
                        <p><?php echo htmlspecialchars($task['description']); ?></p>
                        <p>Status: <?php echo htmlspecialchars($task['status']); ?></p>
                        <a href="edit_task.php?id=<?php echo $task['id']; ?>">Edit</a> |
                        <a href="delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>No tasks found. <a href="add_task.php">Add a task now!</a></p>
        <?php endif; ?>
    </div>

    <script src="js/main.js"></script>
</body>
</html>
