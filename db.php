<?php
// File: db.php

$host = 'localhost';
$dbname = 'todo_list'; // Nama database
$username = 'root';    // Username MySQL (biasanya 'root' untuk server lokal)
$password = '';        // Password MySQL (kosong di XAMPP/WAMP)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname: " . $e->getMessage());
}
?>
