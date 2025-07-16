<?php

session_start();
require "config/conn.php";
// echo $_GET['key'];
if(isset($_GET['key'])){
     
    echo $_GET['key'];
	if($_GET['key']==""){
	$_SESSION['msg'] = 'Missing data';
    header("Location: home.php");
    return;
	}

	$key = $_GET['key'];
    $stmt = $pdo->query("SELECT * FROM website WHERE name LIKE '%$key%' ");
    $row_num = $stmt->rowCount();
    echo $row_num;
    if($row_num<1){
        $_SESSION['msg'] = 'No Record Found';
        header("Location: home.php");
        return;
    }
$stmt->execute();
$_SESSION['data'] = $stmt->fetchAll(PDO::FETCH_ASSOC);
header("Location: home.php");


}


















?>