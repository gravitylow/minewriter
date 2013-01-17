<?php 
require("functions.php"); 
require("../private/config.php");

function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		die($user);
		return $ex;
	}
}

$has=$_GET["has"];
if(!isset($has)) {
	die("0");
} else {
	$db = connectDB($dbUser, $dbPass, $dbName);
	$total = $db->lastinsertid('ID');
	echo($total - $has);
}
?>