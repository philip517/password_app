<?php
$host = 'localhost'; // Database host
$dbname = 'userData'; // Database name
$username = 'testUser'; // Database username
$password = 'test1234'; // Database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // For debugging, remove this in production
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>