<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
$user = $_SESSION['user'];

$todos = $pdo->prepare("SELECT * FROM todolist WHERE user_id = ?");
$todos->execute([$user['id']]);
?>
<h2>Halo, <?= htmlspecialchars($user['username']) ?></h2>
<a href="logout.php">Logout</a>
<h3>Todo List</h3>
<a href="add.php">Tambah</a>
<ul>
    <?php foreach ($todos as $todo): ?>
        <li>
            <?= htmlspecialchars($todo['todo']) ?>
            [<a href="edit.php?id=<?= $todo['id'] ?>">Edit</a>]
            [<a href="delete.php?id=<?= $todo['id'] ?>" onclick="return confirm('Hapus?')">Hapus</a>]
        </li>
    <?php endforeach ?>
</ul>