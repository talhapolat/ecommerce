<?php  
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");



$s2optionQuery = $dbConnect->prepare("SELECT * FROM suboption WHERE id IN (SELECT suboption2 FROM product_option WHERE suboption1 = (SELECT id FROM suboption WHERE title = ?))");
$s2optionQuery->execute([$_POST["dropdownValue"]]);
$s2optionNum = $s2optionQuery->rowCount();
$s2options = $s2optionQuery->fetchAll(PDO::FETCH_ASSOC);

$array = array();

if ($s2optionNum > 0) {
	foreach ($s2options as $key => $s2option) {
	array_push($array, $s2option);
}
} else {
	$array = null;
}



echo json_encode($array);


?>