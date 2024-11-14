<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $deadline = $_POST['deadline'];

    $stmt = $pdo->prepare("UPDATE tasks SET name = ?, date = ?, deadline = ? WHERE id = ?");
    $stmt->execute([$name, $date, $deadline, $id]);

    header("Location: index.php");
    exit;
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>
    <form action="" method="post">
        <label>Task Name:</label>
        <input type="text" name="name" value="<?php echo htmlspecialchars($task['name']); ?>" required><br>
        <label>Date:</label>
        <input type="date" name="date" value="<?php echo htmlspecialchars($task['date']); ?>" required><br>
        <label>Deadline:</label>
        <input type="date" name="deadline" value="<?php echo htmlspecialchars($task['deadline']); ?>" required><br>
        <button type="submit">Save Task</button>
    </form>
</body>
</html>
