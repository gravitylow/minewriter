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
$hash = secureHash($username, $password); //This is a private function for security reasons
$query = "SELECT * FROM milky_minewriter.Users WHERE username = :user";
$stmt = $db->prepare($query);
$stmt->bindParam(':user', $username);
//$stmt->bindParam(':password', $password);
$stmt->execute();
$row = $stmt->fetch();
if ($row['id'] == null) { //No such user
	header("Location: login.php?e=1");
	die();
} else {
	echo (checkHash($password, $row['password'], $username));
}
session_start();
die();
$_SESSION['username'] = $username;
$_SESSION['id'] = $row['id'];
$_SESSION['access'] = $row['access'];
header("Location: index.php");
die();
?>
