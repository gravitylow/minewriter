<?php
require("../private/config.php");
$ip = $_SERVER['REMOTE_ADDR'];
$auth = false;
error_reporting(E_ERROR);
if ($ip == "74.106.16.4") {
	$auth = true;
}
if (!$auth) {
	file_put_contents("logs/stats.txt", "\n" . date("Y-m-d H:i:s") . ": Unauthorised stats update attempt from $ip", FILE_APPEND | LOCK_EX);
	die("You are not authorized to update the stats, continued attempts will lead to your ip being blacklisted");
}
function connectDB($user, $pass, $db) {
try {	
	return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
} catch(PDOException $ex) {
	return $ex;
}

}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$db = connectDB($dbUser, $dbPass, $dbName);
	if ($db instanceof PDOException) {
		die ($db->getMessage());
		}
	$input = file_get_contents('php://input');
	$input = substr($input, 5);
	$input = urldecode($input);
	$jsonObj = json_decode($input, true);
	$sql = "UPDATE `Stats` SET `TotalChars`=:Chars,`AverageChars`=:AvgChars,`BookCount`=:Count,`MostUsedWord`=:FavWord,`LongestBook`=:LongestBook,`LongestBookLength`=:LongestBookLength ,`FavLicense`=:FavLicense";
	$stmt = $db->prepare($sql);
	foreach ($jsonObj as $name => $value) {
			$stmt->bindValue($name,$value);
		} 
		$stmt->execute(); 
	}
?>
