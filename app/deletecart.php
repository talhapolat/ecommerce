<?php 
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");


array_splice($_SESSION["qty"], $_GET['key'], 1);
array_splice($_SESSION["cart"], $_GET['key'], 1);

header('Location: ' . $_SERVER['HTTP_REFERER']);


 ?>