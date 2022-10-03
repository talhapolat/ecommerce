<?php 
session_start();
ob_start();
require_once("connect.php");
require_once("func.php");

$discount = 0;
$carttotal = 0;


foreach ($_SESSION["qty"] as $key => $qty) {
	$carttotal += $qty['qty']*$_SESSION['cart'][$key]['price'];
}


if (isset($_GET["ccode"])) {

	$couponQuery = $dbConnect->prepare("SELECT * FROM coupons WHERE ccode = ?");
	$couponQuery->execute([$_GET["ccode"]]);
	$couponNum = $couponQuery->rowCount();
	$coupon = $couponQuery->fetch(PDO::FETCH_ASSOC);

	if ($couponNum == 1) {
		$_SESSION['ccode'] = $_GET["ccode"];





	}
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}


if (isset($_GET['cancelCoupon'])) {
	unset($_SESSION['ccode']);
	unset($_SESSION['discount']);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}





?>


