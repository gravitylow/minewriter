<?php
require("../private/config.php");
function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}
	
}
/* 
	Why this file was created:
	- To create a very simple lookup service
	Why not use query? 
	- It's not always necessary to need something other than JSON
	- It does not and will not export more book details
	- Querying increments the download count, which true API access should not
	- Querying will be subject to strict rate limiting to reduce abuse, while this not
	Will query be deprecated?
	- Maybe, I (milkywayz), would like to strongly recommend JSON to be used as it simplifies alot of the 'query' process
	- Query is still used by minereader, but not the stats service.
	- Query still supports author + title to find a book, this exclusively uses ID
*/
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