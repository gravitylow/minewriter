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
	$arr = array(); 
	$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 
	
switch($Type) {
	case "JSON":
			$rows = array();
			while($r = mysql_fetch_assoc($rs)) {
				$rows[] = $r;
			}
			echo json_encode($rows);		
		break;
	case "TEXT":
			$row = mysql_fetch_array($rs);
			echo $row['Content'];
		break;
	default:
		break;
}
mysql_close($link);
?> 
