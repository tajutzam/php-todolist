<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header("Location: login.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("INSERT INTO todolist (user_id, todo) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user']['id'], $_POST['todo']]);
    header("Location: index.php");
}
?>
<form method="post">
    <h2>Tambah Todo</h2>
    Todo: <input name="todo" required>
    <button>Simpan</button>
</form>