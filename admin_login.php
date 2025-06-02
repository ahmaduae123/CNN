<?php include('db.php'); ?>
<?php
if (!isset($_GET['id'])) {
    echo "Article not found.";
    exit;
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->execute([$id]);
$article = $stmt->fetch();

if (!$article) {
    echo "Article not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title><?= $article['title']; ?></title>
    <style>
        body { font-family: Arial; padding: 20px; background: #f9f9f9; }
        .content { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 8px; }
        img { width: 100%; border-radius: 8px; }
    </style>
</head>
<body>
    <div class="content">
        <h1><?= $article['title']; ?></h1>
        <img src="<?= $article['image']; ?>" alt="">
        <p><?= nl2br($article['full_content']); ?></p>
    </div>
</body>
</html>
