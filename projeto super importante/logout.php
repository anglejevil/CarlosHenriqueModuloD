<!-- tenta advinhar do que o logout.php se trata -->
<?php
session_start();
session_destroy();
header("Location: login.php");
exit;
