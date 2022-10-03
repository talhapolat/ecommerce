<?php  
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");


$pid = $_POST['id'];

$getlistQuery = $dbConnect->prepare("SELECT * FROM favorites WHERE user_id = ? and product_id = ?");
$getlistQuery->execute([$user['id'], $pid]);
$getlistNum = $getlistQuery->rowCount();
$getlists = $getlistQuery->fetchAll(PDO::FETCH_ASSOC);

if ($getlistNum == 0) {
	$listinsertQuery = $dbConnect->prepare("INSERT INTO favorites (user_id, product_id, created_at) values (?,?,?)");
	$listinsertQuery->execute([$user['id'], $pid, $time]);
	$listinsertControl = $listinsertQuery->rowCount();
}

if ($listinsertControl > 0) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}




?>