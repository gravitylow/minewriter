<?php include "../private/config.php";

$Author=$_GET["author"];
$Title=$_GET["title"];
$Type=$_GET["type"];
$ID=$_GET['id'];
$Ip = $_SERVER['REMOTE_ADDR'];


$link = mysql_connect($dbHost, $dbUser, $dbPass) or die('Connection to MySQL has failed!'); 
if(is_null(id)) {
	if(is_null($Author)) {
		die("Query is missing the author");
	} else if(is_null($Title)) {
			die("Query is missing the title");
	} else if(is_null($Type)) {
		die("Query is missing the type");
	}
}
	file_put_contents("logs/api_requests.txt", "\n" . date("Y-m-d H:i:s") . ": Recieved API request from $Ip : Querying '$Author - $Title'", FILE_APPEND | LOCK_EX);
	mysql_select_db($dbName) or die("Could not select database"); 
	if(is_null($ID)) {
		$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 
	} else {
		$rs = mysql_query("SELECT * FROM `Books` WHERE `ID`='$ID' LIMIT 1"); 
	}	
	$row = mysql_fetch_array($rs);
	
switch($Type) {
	case "JSON":
			$array = array('Author' => $row['Author'], 'Title' => $row['Title'], 'Content' => $row['Content']);
			echo json_encode($array);		
		break;
	case "TEXT":			
			echo "!Author-" .$row['Author']. "<br />";
			echo "!Title-" .$row['Title']. "<br />";
			echo $row['Content'];
		break;
	case "YAML":
			echo "Author: \"" .$row['Author']."\"<br />";
			echo "Title: \"" .$row['Title']. "\"<br />";
			echo "Content: \"".$row['Content']."\"<br />";
	default:			
		break;
}
mysql_close($link);
?> 
