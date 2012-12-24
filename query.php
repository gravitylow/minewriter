<?php include "../private/config.php";

$Author=$_GET["author"];
$Title =$_GET["title"];
$ip = $_SERVER['REMOTE_ADDR'];
//Don't expose any DB details
$link = mysql_connect($dbHost, $dbUser, $dbPass); 
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
mysql_select_db($dbName) or die("Could not select database"); 
$arr = array(); 
file_put_contents("api_requests.txt", "\n" . date("Y-m-d H:i:s") . ": Recieved API request from $ip for $Author, $Title", FILE_APPEND | LOCK_EX);
$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 
$rows = array();
while($r = mysql_fetch_assoc($rs)) {
    $rows[] = $r;
}
print json_encode($rows);
mysql_close($link);
?> 
