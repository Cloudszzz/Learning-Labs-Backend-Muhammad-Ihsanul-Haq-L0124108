<?php
require 'db.php';

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $pdo->prepare("UPDATE tasks SET status = 'selesai' WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>