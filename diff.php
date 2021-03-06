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
$db = connectDB($dbUser, $dbPass, $dbName);
$sql = "SELECT MAX(id) FROM `Books`"; 
$stmt = $db->prepare($sql);
$stmt->execute();
$row = $stmt->fetch();
$total = $row['MAX(id)'];
echo($total - $has);
?>