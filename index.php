<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To-Do List with Deadlines</title>
</head>
<body>
    <h1>To-Do List</h1>
    <a href="add.php">Add New Task</a>
    <ul>
        <?php
      
        $stmt = $pdo->query("SELECT * FROM tasks");
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!file_exists('tasks.txt')) {
            $tasks = [
                "Project akhir Learling Labs Front End|2024-10-31|2024-11-09|selesai",
                "Project akhir Learning labs Back End|2024-11-04|2024-11-14|selesai",
                "Laporan Praktikum 7 Sistem Digital|2024-11-07|2024-11-14|selesai",
                "Tugas KP|2024-11-13|2024-11-19|belum",
                "Laporan Praktikum 8 Sistem Digital|2024-11-14|2024-11-21|belum"
            ];
        } else {
            foreach ($tasks as $task) {
                $statusText = ($task['status'] === 'selesai') ? "<strong style='color:green;'>Completed</strong>" : "<em>Not Completed</em>";
                
                echo "<li><strong>{$task['name']}</strong> <br>Date: {$task['date']} <br>Deadline: {$task['deadline']} <br>Status: $statusText<br>";
                
                if ($task['status'] === 'belum') {
                    echo "<a href='mark_complete.php?id={$task['id']}'>Mark as Complete</a> | ";
                }
                
                echo "<a href='edit.php?id={$task['id']}'>Edit</a> | ";
                echo "<a href='delete.php?id={$task['id']}' onclick='return confirm(\"Are you sure you want to delete this task?\");'>Delete</a></li>";
            }
        }
        ?>
    </ul>
</body>
</html>
