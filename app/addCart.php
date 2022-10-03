<?php
session_start();
ob_start();

$pcart = array("id"=>$_POST["id"], "title"=>$_POST["title"], "image"=>$_POST["image"], "price"=>$_POST["price"], "option1"=>"", "option2"=>"");
if ($_POST["qty"] < 1) {
	$qty = array("qty"=>1);
} elseif ($_POST["qty"] > 99) {
	$qty = array("qty"=>99);
} else {
	$qty = array("qty"=>$_POST["qty"]);
}

if (isset($_POST["option1"])) {
	$pcart["option1"] = $_POST["option1"];
}
if (isset($_POST["option2"])) {
	$pcart["option2"] = $_POST["option2"];
}

$cartcontrol = array_search($pcart, $_SESSION['cart']);

if ($cartcontrol === false) {
	array_push($_SESSION['cart'], $pcart);
	array_push($_SESSION['qty'], $qty);
	$sameproduct = 999;
} else {
	$_SESSION['qty'][$cartcontrol]['qty'] += $_POST["qty"];
	if ($_SESSION['qty'][$cartcontrol]['qty'] < 1) {
		$_SESSION['qty'][$cartcontrol]['qty'] = 1;
	} elseif ($_SESSION['qty'][$cartcontrol]['qty'] > 99) {
		$_SESSION['qty'][$cartcontrol]['qty'] = 99;
	} else {

	}
	$sameproduct = $cartcontrol;
}

$carttotal = 0;

foreach ($_SESSION["qty"] as $key => $qty) {
	$carttotal += $qty['qty']*$_SESSION['cart'][$key]['price'];
}

$resulta[0] = $carttotal;
$resulta[1] = $sameproduct;

echo json_encode($resulta);

?>
