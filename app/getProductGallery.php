<?php  
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");

    $pid = $_GET["pid"];
		
	$getGalleryQuery = $dbConnect->prepare("SELECT * FROM gallery WHERE product_id = ?");
	$getGalleryQuery->execute([$pid]);
	$getGalleryNum = $getGalleryQuery->rowCount();
	$getGalleries = $getGalleryQuery->fetchAll(PDO::FETCH_ASSOC);

	foreach ($getGalleries as $key => $getGallery) {
		$gallery[$key] = $getGallery["image"];
	};

	echo json_encode($gallery);

?>
