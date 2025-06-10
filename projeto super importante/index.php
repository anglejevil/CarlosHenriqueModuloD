<?php
include 'db.php';
session_start();
// busca e ordena os mangas por id
$mangas = $pdo->query("SELECT * FROM mangas ORDER BY id DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Mangashell ଳ: All peak, no mid.</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
    body {
        font-family: Arial;
        padding: 20px;
        background-color: #1e1e1e;
        color: #e0e0e0;
    }

    nav a {
        margin-right: 10px;
        color:rgb(133, 133, 255);
        text-decoration: none;
    }

    h1 {
        color:rgb(133, 133, 255);
    }

    .manga {
        background-color: #2b2b2b;
        border-radius: 10px;
        padding: 15px;
        margin: 10px;
        display: inline-block;
        vertical-align: top;
        width: 220px;
        word-wrap: break-word;
    }

    .manga h2 {
        font-size: 16px;
        color:rgb(133, 133, 255);
        margin: 0 0 10px 0;
        word-break: break-word;
    }

    .manga img {
        width: 100%;
        height: auto;
        border-radius: 10px;
        display: block;
    }

    .manga p {
        font-size: 14px;
        margin: 10px 0;
    }

    .manga a {
        color:rgb(133, 133, 255);
        text-decoration: none;
        font-weight: bold;
    }
</style>
</head>
<body>

<!-- botões de acesso de conta -->
<nav>
    <?php if (isset($_SESSION['user_id'])): ?>
        <strong>Welcome!</strong>
        <a href="dashboard.php">Admin Panel</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</nav>

<h1>Mangashell ଳ</h1>

<!-- lista de mangas -->
<?php foreach ($mangas as $manga): ?>
    <div class="manga">
    <h2>
  <a href="manga.php?id=<?= $manga['id'] ?>">
    <?= htmlspecialchars($manga['title']) ?>
  </a>
</h2>

        <?php if ($manga['image']): ?>
           <img src="uploads/<?= $manga['image'] ?>" alt="<?= htmlspecialchars($manga['title']) ?>">
        <?php else: ?>
            <img src="uploads/default_cover.jpg" alt="Default Cover">
        <?php endif; ?>
        <p><?= nl2br(htmlspecialchars($manga['description'])) ?></p>
        <a href="reader.php?id=<?= $manga['id'] ?>">Read</a>
    </div>
<?php endforeach; ?>

</body>
</html>
