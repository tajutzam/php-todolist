<?php
session_start();
include 'db.php';
if (!isset($_SESSION['user'])) header("Location: login.php");

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM todolist WHERE id = ? AND user_id = ?");
$stmt->execute([$id, $_SESSION['user']['id']]);
header("Location: index.php");
