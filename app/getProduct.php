<?php  
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");

$pid = $_GET["pid"];

$getproductQuery = $dbConnect->prepare("SELECT * FROM products WHERE id = ?");
$getproductQuery->execute([$pid]);
$getproductNum = $getproductQuery->rowCount();
$getproduct = $getproductQuery->fetch(PDO::FETCH_ASSOC);

if (isset($user)) {
	$isFavQuery = $dbConnect->prepare("SELECT * FROM favorites WHERE user_id = ? and product_id = ?");
	$isFavQuery->execute([$user["id"],$pid]);
	$isFavQueryNum = $isFavQuery->rowCount();
	$isFavProduct = $isFavQuery->fetch(PDO::FETCH_ASSOC);
} else {
	$isFavQueryNum = 0;
}

if ($isFavQueryNum == 1) {
	$isFav = true;
} else {
	$isFav = false;
}

$modelproduct[0] = $getproduct["title"];
$modelproduct[1] = $getproduct["price"];
$modelproduct[2] = $getproduct["shortDesc"];
$modelproduct[3] = $getproduct["image"];
$modelproduct[4] = $getproduct["id"];
$modelproduct[5] = $isFav;

echo json_encode($modelproduct);

?>
