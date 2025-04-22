<?php
$host = "172.31.12.226";  // Ganti dengan endpoint RDS
$dbname = "todolist_db";  // Nama database yang digunakan
$username = "root";  // Username RDS kamu
$password = "Rahsia123.";

try {
    // Menghubungkan ke RDS MySQL menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode untuk menampilkan error jika ada masalah
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
