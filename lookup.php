<?php
require("../private/config.php");
function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}
	
}

function outputJSON($row) {
	$array = array('Author' => $row['Author'], 'Title' => $row['Title'], 'ID' => $row['ID'] , 
	'License' => $row['License'], 'Genre' => $row['genre'], 'Date' => $row['Date'] , 
	'Nswf' => $row['nsfw'], 'Content' => $row['Content']);
	return json_encode($array);
}

$ID=$_GET['id'];
if(isset($ID)) {
	$db = connectDB($dbUser, $dbPass, $dbName);
		if ($db instanceof PDOException) {
			die ($db->getMessage());
		}
		$sql = "SELECT * FROM `Books` WHERE `ID` = :id LIMIT 1"; 
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':id', $ID);
		$stmt->execute();
		$row = $stmt->fetch();
		echo outputJSON($row);	
}
?>