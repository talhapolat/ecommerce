<?php
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");


$s1optionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption1 FROM product_option WHERE product_id = ?)");
$s1optionQuery->execute([$_POST["pid"]]);
$s1optionNum = $s1optionQuery->rowCount();
$s1options = $s1optionQuery->fetchAll(PDO::FETCH_ASSOC);

$array = array();

if ($s1optionNum > 0) {
	foreach ($s1options as $key => $s1option) {
		array_push($array, $s1option);
}
} else {
	$array = null;
}




echo json_encode($array);


?>
