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
$hash = secureHash($username, $password);

$stmt = $db->prepare("SELECT * FROM milky_minewriter.Users WHERE `username` = :user");
$stmt->bindParam(':user', $username);
$stmt->execute();
$row = $stmt->fetch();

if ($stmt->rowCount() == 0) { //No such user
	header("Location: login.php?e=1");
	die();
}

if(!checkHash($password, $row['password'], $username)) { //Incorrect password
	header("Location: login.php?e=1");
	die();
}

if($row['active'] == false) { //Email not verified, account not active
	header("Location: login.php?e=0");
	die();
}

session_start();
$_SESSION['username'] = $username;
$_SESSION['id'] = $row['id'];
$_SESSION['access'] = $row['access'];
header("Location: index.php");
die();
?>
