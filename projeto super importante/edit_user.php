<?php
include 'protect.php';
include 'db.php';

if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch();
// atualizar as informações sobre o usuario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $role = $_POST['role'];

    $stmt = $pdo->prepare("UPDATE users SET username = ?, role = ? WHERE id = ?");
    $stmt->execute([$username, $role, $id]);

    header("Location: users.php");
    exit;
}
?>

<form method="post">
    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
    <select name="role">
        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>
    <button type="submit">Update</button>
</form>
