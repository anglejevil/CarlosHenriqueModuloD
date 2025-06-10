<?php
include 'protect.php';
include 'db.php';

// Só permitir administradores
if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit;
}

$users = $pdo->query("SELECT * FROM users")->fetchAll();
?>
<!-- registro de usuario e edição de usuarios existentes -->
<h2>Users</h2>
<a href="register.php">Add New User</a>
<table border="1">
    <tr>
        <th>ID</th><th>Username</th><th>Role</th><th>Actions</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <a href="edit_user.php?id=<?= $user['id'] ?>">Edit</a> | 
                <a href="delete_user.php?id=<?= $user['id'] ?>" onclick="return confirm('Delete this user?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
