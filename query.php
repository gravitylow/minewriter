<?php require("../private/config.php");
//Absolute crude API file, WIP
$Author=$_GET["author"];
$Title =$_GET["title"];
//Don't expose any DB details
$link = mysql_pconnect($dbHost, "$dbUser, $dbPass) or die("Could not connect"); 
mysql_select_db($dbName) or die("Could not select database"); 

$arr = array(); 
//Make this PRECISE!
$rs = mysql_query("SELECT * FROM `Books` WHERE `Author`='$Author' AND `Title`='$Title' LIMIT 1"); 

$rows = array();
while($r = mysql_fetch_assoc($rs)) {
    $rows[] = $r;
}
print json_encode($rows);
?> 
