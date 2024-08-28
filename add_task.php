<?php
include 'includes/config.php';
include 'includes/functions.php';
include 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];
    $user_id = $_SESSION['user_id'];

    $stmt = $conn->prepare("INSERT INTO tasks (user_id, title, description, category, due_date, status) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $user_id, $title, $description, $category, $due_date, $status);
    $stmt->execute();
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <title>Add Task</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Add Task</h1>
        </header>
        <form method="POST" action="add_task.php" class="task-form">
            <input type="text" name="title" placeholder="Title" required>
            <textarea name="description" placeholder="Description" required></textarea>
            <select name="category" required>
                <option value="Work">Work</option>
                <option value="Personal">Personal</option>
            </select>
            <input type="date" name="due_date" required>
            <select name="status" required>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
            <button type="submit" class="button">Add Task</button>
        </form>
    </div>
</body>
</html>
