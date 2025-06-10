<?php
include 'protect.php';
include 'db.php';
// deleta usuarios
if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: users.php");
exit;
