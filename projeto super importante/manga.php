<?php
session_start();
include 'db.php';

if (!isset($_GET['id'])) {
    echo "Manga not found.";
    exit;
}

$id = $_GET['id'];

// buscar manga
$stmt = $pdo->prepare("SELECT * FROM mangas WHERE id = ?");
$stmt->execute([$id]);
$manga = $stmt->fetch();

if (!$manga) {
    echo "Manga not found.";
    exit;
}

// novo comentario
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['user_id'])) {
    $content = $_POST['content'];
    $stmt = $pdo->prepare("INSERT INTO comments (user_id, manga_id, content) VALUES (?, ?, ?)");
    $stmt->execute([$_SESSION['user_id'], $id, $content]);
    header("Location: manga.php?id=" . $id);
    exit;
}

// ver comentarios
$stmt = $pdo->prepare("
    SELECT c.content, c.created_at, u.username
    FROM comments c
    JOIN users u ON c.user_id = u.id
    WHERE c.manga_id = ?
    ORDER BY c.created_at DESC
");
$stmt->execute([$id]);
$comments = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= htmlspecialchars($manga['title']) ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<nav>
    <a href="index.php">Home</a>
    <?php if (isset($_SESSION['user_id'])): ?>
        <a href="dashboard.php">Admin Panel</a>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>
</nav>

<div style="display: flex; gap: 20px; align-items: flex-start; margin-bottom: 30px;">
    <?php if ($manga['image']): ?>
        <img src="uploads/<?= $manga['image'] ?>" alt="<?= htmlspecialchars($manga['title']) ?>" 
             style="max-width: 300px; height: auto; border: 1px solid #333;">
    <?php endif; ?>

    <div style="color: white;">
        <h1><?= htmlspecialchars($manga['title']) ?></h1>
        <p><?= nl2br(htmlspecialchars($manga['description'])) ?></p>
        <a href="reader.php?id=<?= $manga['id'] ?>">Read</a>
    </div>
</div>


<hr>

<h2>Comments</h2>

<?php foreach ($comments as $comment): ?>
    <div style="background:#8585ff; border:1px solid #000; padding:10px; margin-bottom:10px;">
        <strong><?= htmlspecialchars($comment['username']) ?></strong> 
        <em><?= $comment['created_at'] ?></em>
        <p><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
    </div>
<?php endforeach; ?>

<?php if (isset($_SESSION['user_id'])): ?>
    <h3>Leave a Comment</h3>
    <form method="post">
        <textarea name="content" rows="4" required></textarea><br>
        <button type="submit">Post Comment</button>
    </form>
<?php else: ?>
    <p><a href="login.php">Log in</a> to post a comment.</p>
<?php endif; ?>

</body>
</html>
