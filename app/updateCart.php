<?php 
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");


foreach ($_SESSION["qty"] as $key => $qty) {
	$_SESSION["qty"][$key]['qty'] = $_POST["num-product"][$key];
	if ($_POST["num-product"][$key] < 1) {
		$_SESSION["qty"][$key]['qty'] = 1;
	} elseif ($_POST["num-product"][$key] > 99) {
		$_SESSION["qty"][$key]['qty'] = 99;
	}

	
}


header('Location: ' . $_SERVER['HTTP_REFERER']);


 ?>