<?php
session_start();
// protect
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>
