<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $deadline = $_POST['deadline'];

    $stmt = $pdo->prepare("INSERT INTO tasks (name, date, deadline, status) VALUES (?, ?, ?, 'belum')");
    $stmt->execute([$name, $date, $deadline]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
</head>
<body>
    <h1>Add New Task</h1>
    <form action="" method="post">
        <label>Task Name:</label>
        <input type="text" name="name" required><br>
        <label>Date:</label>
        <input type="date" name="date" required><br>
        <label>Deadline:</label>
        <input type="date" name="deadline" required><br>
        <button type="submit">Add Task</button>
    </form>
</body>
</html>
