<?php
include 'protect.php';
include 'db.php';
// puxa as informações dos mangas do banco de dados
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $img = null;
    if (!empty($_FILES['image']['name'])) {
        $img = basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $img);
    }

    $stmt = $pdo->prepare("INSERT INTO mangas (title, description, image) VALUES (?, ?, ?)");
    $stmt->execute([$title, $desc, $img]);

    header("Location: mangas.php");
    exit;
}
?>
<!-- permite adicionar manga ao banco de dados -->
<h2>Add Manga</h2>
<form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>
