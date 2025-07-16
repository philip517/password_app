<?php
require "config/conn.php";

if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $sql = "SELECT name FROM website WHERE name LIKE ? ORDER BY name ASC LIMIT 10";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(["%$term%"]);
    $results = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo json_encode($results);
}
