<?php
session_start();
require "config/conn.php";



if ( isset($_GET['id']) ) {
	

    try{

    $stmt = $pdo->prepare("DELETE FROM website WHERE id = :xyz");//sql ststement
    $stmt->execute(array(":xyz" => $_GET['id']));//execution of sql statement (this ensures no ad data is gotten from the user and prevents sql injection)
    unset($_GET['id']);
    unset($_SESSION['website_id']);

    $_SESSION['msg'] = 'Record deleted';//message to show record was deleted
    header( 'Location: home.php' ) ;//goes back to the users page
  
    }catch(PDOException $e) {
    $_SESSION['msg'] = "Error: " . $e->getMessage();
    unset($_GET['id']);
    unset($_SESSION['website_id']);

    header("Location: home.php");
  }


}
















?>