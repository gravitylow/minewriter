<?php 
//Absolute crude API file, WIP
$Author=$_POST["author"];
$Title =$_POST["title"];
//Don't expose any DB details
$link = mysql_pconnect("x", "x", "x") or die("Could not connect"); 
mysql_select_db("x") or die("Could not select database"); 

$arr = array(); 
//Make this PRECISE!
$rs = mysql_query("SELECT ". $Title . " FROM x"); 

//Do magic?
while($obj = mysql_fetch_array($rs)) { 
$arr[] = $obj; 

} 
//Echo the json they need! This is wrong, just a template!
$json = '{"blah":'.json_encode($arr).'}'; 
echo $json; 
?> 
