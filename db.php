<?php
$host = "todolistdb.cbyieygqmvuh.ap-southeast-2.rds.amazonaws.com";  // Ganti dengan endpoint RDS
$dbname = "todolist_db";  // Nama database yang digunakan
$username = "root";  // Username RDS kamu
$password = "Rahasia123.";

try {
    // Menghubungkan ke RDS MySQL menggunakan PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set error mode untuk menampilkan error jika ada masalah
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful!";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
