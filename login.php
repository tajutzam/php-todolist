<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$_POST['username']]);
    $user = $stmt->fetch();
    if ($user && password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = $user;
        header("Location: index.php");
    } else {
        echo "Login gagal";
    }
}
?>
<form method="post">
    <h2>Login</h2>
    Username: <input name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button>Login</button>
    <a href="register.php">Daftar akun</a>

</form>