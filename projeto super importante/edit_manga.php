<?php
include 'protect.php';
include 'db.php';

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mangas WHERE id = ?");
$stmt->execute([$id]);
$manga = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $img = $manga['image'];

    // Handle cover image
    if (!empty($_FILES['image']['name'])) {
        $img = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img);
    }

    // Update manga info
    $stmt = $pdo->prepare("UPDATE mangas SET title = ?, description = ?, image = ? WHERE id = ?");
    $stmt->execute([$title, $desc, $img, $id]);

    // Handle multiple image uploads
    if (!empty($_FILES['pages']['name'][0])) {
        $targetDir = "uploads/$id/";
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }

        foreach ($_FILES['pages']['tmp_name'] as $index => $tmpFile) {
            $filename = basename($_FILES['pages']['name'][$index]);
            $targetFile = $targetDir . $filename;
            move_uploaded_file($tmpFile, $targetFile);
        }
    }

    header("Location: mangas.php");
    exit;
}
?>

<h2>Edit Manga</h2>
<form method="post" enctype="multipart/form-data">
    <label>Title:</label><br>
    <input type="text" name="title" value="<?= htmlspecialchars($manga['title']) ?>" required><br><br>

    <label>Description:</label><br>
    <textarea name="description" rows="4"><?= htmlspecialchars($manga['description']) ?></textarea><br><br>

    <label>Cover Image:</label><br>
    <input type="file" name="image"><br>
    <?php if ($manga['image']): ?>
        <img src="uploads/<?= $manga['image'] ?>" width="100"><br>
    <?php endif; ?>
    <br>

    <label>Upload Pages (multiple images):</label><br>
    <input type="file" name="pages[]" accept="image/*" multiple><br><br>

    <button type="submit">Update</button>
</form>