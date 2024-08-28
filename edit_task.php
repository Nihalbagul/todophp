<?php
include 'includes/config.php';
include 'includes/functions.php';
include 'includes/header.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if (isset($_GET['id'])) {
    $task_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ii", $task_id, $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    $task = $result->fetch_assoc();
    
    if (!$task) {
        header('Location: dashboard.php');
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $due_date = $_POST['due_date'];
    $status = $_POST['status'];

    $stmt = $conn->prepare("UPDATE tasks SET title = ?, description = ?, category = ?, due_date = ?, status = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $title, $description, $category, $due_date, $status, $task_id);
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
    <title>Edit Task</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Edit Task</h1>
        </header>
        <form method="POST" action="edit_task.php?id=<?php echo $task_id; ?>" class="task-form">
            <input type="text" name="title" value="<?php echo htmlspecialchars($task['title']); ?>" required>
            <textarea name="description" required><?php echo htmlspecialchars($task['description']); ?></textarea>
            <select name="category" required>
                <option value="Work" <?php echo $task['category'] == 'Work' ? 'selected' : ''; ?>>Work</option>
                <option value="Personal" <?php echo $task['category'] == 'Personal' ? 'selected' : ''; ?>>Personal</option>
            </select>
            <input type="date" name="due_date" value="<?php echo htmlspecialchars($task['due_date']); ?>" required>
            <select name="status" required>
                <option value="Pending" <?php echo $task['status'] == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                <option value="In Progress" <?php echo $task['status'] == 'In Progress' ? 'selected' : ''; ?>>In Progress</option>
                <option value="Completed" <?php echo $task['status'] == 'Completed' ? 'selected' : ''; ?>>Completed</option>
            </select>
            <button type="submit" class="button">Update Task</button>
        </form>
    </div>
</body>
</html>
