<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    if ($stmt->execute([$username, $password])) {
        header("Location: login.php");
    } else {
        echo "Gagal registrasi";
    }
}
?>
<form method="post">
    <h2>Register</h2>
    Username: <input name="username" required><br>
    Password: <input type="password" name="password" required><br>
    <button>Register</button>
</form>