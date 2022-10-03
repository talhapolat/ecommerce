<?php  
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");


$pid = $_POST['id'];

$listinsertQuery = $dbConnect->prepare("DELETE FROM favorites WHERE user_id = ? and product_id = ?");
$listinsertQuery->execute([$user['id'], $pid]);
$listinsertControl = $listinsertQuery->rowCount();



if ($listinsertControl > 0) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}




?>