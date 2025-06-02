<?php
session_start();
if (!isset($_SESSION['admin'])) {
    echo "<script>window.location.href='admin-login.php';</script>";
    exit;
}
include('db.php');

$articles = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        a { text-decoration: none; color: blue; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="add-article.php">➕ Add New Article</a>
    <table>
        <tr>
            <th>Title</th><th>Category</th><th>Actions</th>
        </tr>
        <?php foreach ($articles as $row): ?>
        <tr>
            <td><?= $row['title']; ?></td>
            <td><?= $row['category']; ?></td>
            <td>
                <a href="edit-article.php?id=<?= $row['id']; ?>">Edit</a> |
                <a href="delete-article.php?id=<?= $row['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
