<?php
session_start();

// Include the database connection
require 'config/conn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $_SESSION['USERS']= " ".$username."----".$password;

    // Prepare and execute SQL query
    $sql = "SELECT id, password FROM user WHERE name = :username";
    try {
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        // Fetch the user record
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $_SESSION['userss'] = $user;
        
        if ($user && ($password == $user['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $username;
            
            // Redirect to the home page
            header("Location: home.php");
            exit();
        } else {
            // Invalid username or password
            $_SESSION['error'] = 'Wrong username or password';
            header("Location: index.php");
        
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: index.php");

}
?>