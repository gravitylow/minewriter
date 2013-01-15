<?php
require("../private/config.php");
require("functions.php");
/*
* Script stub for login
*/
function connectDB($user, $pass, $db) {
    try {
        return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
    } catch(PDOException $ex) {
        return $ex;
    }

}
$db = connectDB($dbUser, $dbPass, $dbName);
if ($db instanceof PDOException) {
die ($db->getMessage());
}
$username = strtolower($_POST['username']);
$password = $_POST['password'];
?>
