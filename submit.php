<?php

session_start();
require "config/conn.php";
echo '<h1> '.$_GET['id'].'</h1>';
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {

    // Retrieve form data and sanitize it
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $url = filter_input(INPUT_POST, 'url', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    

  try {
    //$row = $_GET['id'];
    $stmt = $pdo->prepare("SELECT password FROM website WHERE url=:url");
    $stmt->execute(['url' => $url]);
    // Fetch all results into an associative array
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  catch (PDOException $e) {
    $_SESSION['msg'] = "Error: " . $e->getMessage();
    header("Location: add.php");
  }
    // Prepare SQL query to insert data
    if($row){
        if($row['password']===$password){
            $_SESSION['exists'] = ['message'=>'Account Already Exist','name'=>$name,'url'=>$url,'password'=>$password,'description'=>$description];
            header("Location:add.php");
        }
    }else{
        
        try {
            // Prepare and execute the statement
            $stmt = $pdo->prepare("INSERT INTO website (name,url,description,password) VALUES (:name, :url,:description,:password)");
            $stmt->execute([
            ':name'=> $name,
            ':url'=> $url,
            ':description'=> $description,
            ':password'=> $password]);
        
            $_SESSION['msg'] =  "Data successfully inserted!";
            header("Location: home.php");

        } catch (PDOException $e) {

            $_SESSION['msg'] = $dum."Error FROM SUBMIT: ". $e->getMessage();
            header("Location: add.php");
        }
    }
    
    
} elseif(($_SERVER["REQUEST_METHOD"] == "POST") && ($_GET['id']==2)) {
    header("Location: home.php");
}else{
    header("Location: home.php");

}
?>