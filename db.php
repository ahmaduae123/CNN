<?php
$host = 'localhost';
$db = 'db5jh3gmw817mn';
$user = 'unzm7rdkzgjny';
$pass = 'cgudjczogdg4';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
