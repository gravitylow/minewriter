<?php include "../private/config.php";

$Author=$_GET["author"];
$Title=$_GET["title"];
$Type=$_GET["type"];
$ID=$_GET['id'];
$Ip = $_SERVER['REMOTE_ADDR'];
/*
Error Codes:
100 - Database connection failed
101 - No ID, Author null
102 - No ID, Title null
103 - Table selection failed
104 - No / Invalid File Type
*/
$link = mysql_connect($dbHost, $dbUser, $dbPass) or die('100'); 
if(is_null($id)) {
	if(is_null($Author)) {
		die("101");
	} else if(is_null($Title)) {
		die("102");
	} else if(is_null($Type)) {
		die("104");
	}	
		mysql_select_db($dbName) or die("103"); 
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
				die("104");	
			break;
		}
} else {
	if(is_null($Type)) {
		die("104");
	} else {		
		mysql_select_db($dbName) or die("103"); 
			if(is_null($id)) {
				$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 
			} else {							
				$rs = mysql_query("SELECT * FROM `Books` WHERE `ID`='$ID'"); 
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
				die("104");	
			break;
		}
	}
}
mysql_close($link);
?> 
