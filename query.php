<?php include "../private/config.php";

$Author=$_GET["author"];
$Title=$_GET["title"];
$Type=$_GET["type"];
$Ip = $_SERVER['REMOTE_ADDR'];


$link = mysql_connect($dbHost, $dbUser, $dbPass) or die('Mysql error'); 
if (empty($_GET)) {
	die('Invalid request');
}
	file_put_contents("api_requests.txt", "\n" . date("Y-m-d H:i:s") . ": Recieved API request from $Ip for $Author, $Title", FILE_APPEND | LOCK_EX);
	mysql_select_db($dbName) or die("Could not select database"); 
	$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 
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
