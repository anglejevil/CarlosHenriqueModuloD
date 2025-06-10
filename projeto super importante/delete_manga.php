<?php
include 'protect.php';
include 'db.php';

$id = $_GET['id'];

//deleta os comentarios do manga
$stmt = $pdo->prepare("DELETE FROM comments WHERE manga_id = ?");
$stmt->execute([$id]);

// deleta arquivo de imagem do manga
$stmt = $pdo->prepare("SELECT image FROM mangas WHERE id = ?");
$stmt->execute([$id]);
$manga = $stmt->fetch();
if ($manga && $manga['image']) {
    unlink("uploads/" . $manga['image']);
}
// deleta o manga
$stmt = $pdo->prepare("DELETE FROM mangas WHERE id = ?");
$stmt->execute([$id]);

header("Location: mangas.php");
exit;
