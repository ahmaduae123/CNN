<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>My News</title>
  <style>
    body { font-family: Arial; margin: 0; background: #f4f4f4; }
    header { background: #cc0000; color: white; padding: 20px; text-align: center; }
    nav { background: #333; color: white; padding: 10px; display: flex; gap: 20px; }
    nav div:hover { cursor: pointer; text-decoration: underline; }
    .articles { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; padding: 20px; }
    .article { background: white; padding: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); border-radius: 5px; }
    .article img { width: 100%; height: 180px; object-fit: cover; border-radius: 5px; }
    .readmore { background: #cc0000; color: white; padding: 5px 10px; border: none; margin-top: 10px; cursor: pointer; }
  </style>
</head>
<body>

<header>
  <h1>My News</h1>
</header>

<nav>
  <div onclick="filterCategory('All')">All</div>
  <div onclick="filterCategory('Politics')">Politics</div>
  <div onclick="filterCategory('Sports')">Sports</div>
  <div onclick="filterCategory('Tech')">Tech</div>
</nav>

<div class="articles" id="articleContainer">
<?php
$stmt = $pdo->query("SELECT * FROM articles ORDER BY created_at DESC");
while ($row = $stmt->fetch()) {
    echo "<div class='article'>";
    echo "<img src='{$row['image']}' />";
    echo "<h3>{$row['title']}</h3>";
    echo "<p>{$row['short_desc']}</p>";
    echo "<button class='readmore' onclick=\"goToArticle({$row['id']})\">Read More</button>";
    echo "</div>";
}
?>
</div>

<script>
function goToArticle(id) {
  window.location.href = 'article.php?id=' + id;
}
function filterCategory(cat) {
  // Optional: Add JS filter logic if you want, or keep it static.
}
</script>

</body>
</html>
