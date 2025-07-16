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
    $id = $_GET['id'];
    $newpassword='';
    
    if (!empty($password)) {
    $newpassword = password_hash($password, PASSWORD_BCRYPT);
    // update with new hash
} 
    echo $id,$id,$name,$url,$password;

    //$processeddata = $_GET['id'];
    $sql = "SELECT * FROM website WHERE id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(":id"=> $id));

    // Fetch all results into an associative array
    $processeddata = $stmt->fetch(PDO::FETCH_ASSOC);
        
    var_dump($processeddata);
    }
    

    try{


    $stmt = $pdo->prepare("UPDATE website SET name = :name, url = :url, description = :description, password = :password WHERE website.id = :id ");
      $stmt->execute([
      ':name'=> $name,
      ':url'=> $url,
      ':description'=>$description ,
      ':password'=> $password,
      ':id'=>$id]);
  
      $_SESSION['msg'] = "Data successfully inserted!";
      header("Location:home.php");
  
  } catch (PDOException $e) {
  
      $_SESSION['msg'] = $dum."Error FROM SUBMIT: ". $e->getMessage();
      header("Location: edit.php?id=".$id);
  }
    

?>