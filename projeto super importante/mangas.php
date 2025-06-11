<?php
include 'protect.php';
include 'db.php';

$mangas = $pdo->query("SELECT * FROM mangas")->fetchAll();
?>
<!-- adição, remoção e edição de manga -->
<h2>Mangas</h2>
<a href="dashboard.php">Back to Admin Panel</a> |
<a href="add_manga.php">Add New Manga</a>

<table border="1">
    <tr>
        <th>Title</th><th>Description</th><th>Image</th><th>Actions</th>
    </tr>
    <link rel="stylesheet" href="css/style.css">
    <?php foreach ($mangas as $manga): ?>
        <tr>
            <td><?= htmlspecialchars($manga['title']) ?></td>
            <td><?= htmlspecialchars($manga['description']) ?></td>
            <td>
                <?php if ($manga['image']): ?>
                    <img src="uploads/<?= $manga['image'] ?>" width="100">
                <?php else: ?>
                    No image
                <?php endif; ?>
            </td>
            <td>
                <a href="edit_manga.php?id=<?= $manga['id'] ?>">Edit</a> |
                <a href="delete_manga.php?id=<?= $manga['id'] ?>" onclick="return confirm('Delete this manga?')">Delete</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
