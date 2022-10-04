<?php
$ip		      = $_SERVER["REMOTE_ADDR"];
$timeDamga    = time();
$time         = date("Y/m/d", $timeDamga);

if (isset($_SESSION["cart"])) {

} else {
	$_SESSION['cart'] = array();
	$_SESSION["carttotal"] = 0;
}

if (isset($_SESSION['qty'])) {

} else {
	$_SESSION['qty'] = array();
}


function Security($var){
	$clearSpace		= trim($var);
	$clearTag       = strip_tags($clearSpace);
	$etkisizyap     = htmlspecialchars($clearTag);
	$result   	    = $etkisizyap;
	return $result;
}

function DonusumleriGeriDondur($var){
	$back = htmlspecialchars_decode($var, ENT_QUOTES);
	return $back;
}

if (isset($_SESSION["useremail"])) {

	$memberQuerys = $dbConnect->prepare("SELECT * FROM users WHERE email = ? LIMIT 1");
	$memberQuerys->execute([$_SESSION["useremail"]]);
	$membernum = $memberQuerys->rowCount();
	$user = $memberQuerys->fetch(PDO::FETCH_ASSOC);

	if ($membernum > 0) {
		$id		    =	$user["id"];
		$username	=	$user["name"];
		$surname    =	$user["surname"];
		$email		=	$user["email"];
		$gender		=	$user["gender"];
		$phone		=	$user["phone"];
		$city		=	$user["city"];
		$bday		=	$user["bday"];
		$bmonth		=	$user["bmonth"];
		$byear		=	$user["byear"];
		$privacy	=   $user["privacy"];
		$created_at =	$user["created_at"];
		$statu		=	$user["statu"];
	}
}




?>
