<?php
try {
	$dbConnect = new PDO("mysql:host=localhost;dbname=ahlat;charset=utf8", "root");
} catch (PDOException $Hata) {
	echo "Bağlantı Hatası";
	die();
}

$connectQuery	 = $dbConnect->prepare("SELECT * FROM settings LIMIT 1");
$connectQuery->execute();
$settingNum 	 = $connectQuery->rowCount();
$settings 	     = $connectQuery->fetch(PDO::FETCH_ASSOC);

if ($settingNum > 0) {
	$name          = $settings["name"];
	$title         = $settings["title"];
	$desc          = $settings["description"];
	$keywords      = $settings["keywords"];
	$copyright     = $settings["copyrightText"];
	$logo          = $settings["logo"];
	$smtphost      = $settings["SMTPhost"];
	$smtpmail      = $settings["SMTPmail"];
	$smtppass      = $settings["SMTPpass"];
} else {
	echo "Bağlantı Hatası";
	die();
}


