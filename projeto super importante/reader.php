<?php
include 'db.php';
session_start();

if (!isset($_GET['id'])) {
    echo "My bad, nothing to be found.";
    exit;
}

$id = $_GET['id'];

// fetch manga
$stmt = $pdo->prepare("SELECT title FROM mangas WHERE id = ?");
$stmt->execute([$id]);
$chapters = $stmt->fetch();

if (!$chapters) {
    echo "My bad, nothing to be found.";
    exit;
}

// get pages
$dir = "uploads/$id/";
$pages = glob($dir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
natsort($pages); //actually properly sort out the pages
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reading: <?= htmlspecialchars($manga['title']) ?></title>
    <style>
        body {
            background-color: #fefefe;
            color: #000;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            margin-top: 20px;
        }
        img.page {
            max-width: 90%;
            height: auto;
            margin: 20px 0;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
        }
        nav {
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #333;
            padding: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">← Back to Library</a>
    <a href="manga.php?id=<?= $id ?>">Manga Info</a>
</nav>

<h1><?= htmlspecialchars($manga['title']) ?></h1>

<?php if (count($pages) === 0): ?>
    <p>No pages uploaded yet.</p>
<?php else: ?>
    <?php foreach ($pages as $page): ?>
        <img class="page" src="<?= htmlspecialchars($page) ?>" alt="Page">
    <?php endforeach; ?>
<?php endif; ?>

</body>
</html>