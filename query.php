<?php 
//Includes
use Symfony\Component\Yaml\Yaml;
require("../private/config.php");
include("yaml_lib/Yaml.php");
include("yaml_lib/Dumper.php");
include("yaml_lib/Inline.php");
include("yaml_lib/Escaper.php");

//die ($dbUser);
//Functions
function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=UTF-8", $user, $pass));
	} catch(PDOException $ex) {
		die($user);
		return $ex;
	}
	
}

function outputJSON($row) {
	$array = array('Author' => $row['Author'], 'Title' => $row['Title'], 'Content' => $row['Content']);
	return json_encode($array);
}

function outputDump($row) {
	$array = array('Author' => $row['Author'], 'Title' => $row['Title'], 'Content' => $row['Content']);
	return var_dump($array);
}

function outputText($row) {
	return "!Author-" .$row['Author']. "\n" .
	"!Title-" .$row['Title']. "\n" .
	$row['Content'];
}

function outputYAML($row) {
	$array = array('Author' => $row['Author'], 'Title' => $row['Title'], 'Content' => $row['Content']);
	//echo yaml_emit($array);
	return Yaml::dump($array);
}

//User-supplied vars
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
105 - No results found
*/

if(is_null($id)) {
	if(is_null($Author)) {
		die("101");
	} else if(is_null($Title)) {
		die("102");
	} else if(is_null($Type)) {
		die("104");
	}	
		$db = connectDB($dbUser, $dbPass, $dbName);
		if ($db instanceof PDOException) {
			die ($db->getMessage());
		}
		$query = "SELECT * FROM `Books` WHERE `Author` = :author AND `Title` = :title LIMIT 1";
		$stmt = $db->prepare($query);
		$stmt->bindParam(':author', $Author);
		$stmt->bindParam(':title', $Title);
		$stmt->execute();
		$row = $stmt->fetch();
		if ($row['ID'] == null) {
			die("105");
		}
		switch($Type) {
			case "JSON":
				echo outputJSON($row);		
			break;
			case "TEXT":			
				echo outputText($row);
			break;
			case "YAML":
				echo outputYaml($row);
				break;
			case "dump":
				echo outputDump($row);
			default:	
				echo outputJSON($row);	
			break;
		}
} else {
	if(is_null($Type)) {
		die("104");
	} else {		
		$db = connectDB($dbUser, $dbPass, $dbName);
		if ($db instanceof PDOException) {
			die ($db->getMessage());
		}
		if(is_null($id)) {
			$sql = "SELECT * FROM `Books` WHERE `Author` = :author AND `Title` = :title LIMIT 1"; 
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':author', $Author);
			$stmt->bindParam(':title', $Title);
		} else {							
			$sql = "SELECT * FROM `Books` WHERE `ID` = :id LIMIT 1"; 
			$stmt = $db->prepare($sql);
			$stmt->bindParam(':id', $ID);
		}
		$stmt->execute();
		$row = $stmt->fetch();
		if ($row['ID'] == null) {
			die("105");
		}
		switch($Type) {
			case "JSON":
				echo outputJSON($row);		
			break;
			case "TEXT":			
				echo outputText($row);
			break;
			case "YAML":
				echo outputYaml($row);
				break;
			case "dump":
				echo outputDump($row);
			default:	
				echo outputJSON($row);	
			break;
		}
	}
}
?> 
