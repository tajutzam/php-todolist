<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header("Location: login.php");

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM todolist WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user']['id']]);
$todo = $stmt->fetch();
if (!$todo) exit('Todo tidak ditemukan.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("UPDATE todolist SET todo = ? WHERE id = ?");
    $stmt->execute([$_POST['todo'], $id]);
    header("Location: index.php");
}
?>
<form method="post">
    <h2>Edit Todo</h2>
    Todo: <input name="todo" value="<?= htmlspecialchars($todo['todo']) ?>" required>
    <button>Update</button>
</form>