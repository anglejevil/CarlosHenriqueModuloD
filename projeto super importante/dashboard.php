<?php
include 'protect.php';

if ($_SESSION['role'] !== 'admin') {
    echo "Access denied!";
    exit;
}
?>
<link rel="stylesheet" href="css/style.css">
<h1>Admin Dashboard</h1>
<!--manuseio de contas de usuario para os admnistradores-->
<ul>
    <li><a href="users.php">Manage Users</a></li>
    <li><a href="mangas.php">Manage Mangas</a></li>
    <li><a href="logout.php">Logout</a></li>
    <li><a href="index.php">Return to Index</a></li>
</ul>
