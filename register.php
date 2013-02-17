<?php
if($_SERVER['REQUEST_METHOD'] !== "POST")
	die("Invalid request.");

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
$confirm = $_POST['password_confirm'];
$email = $_POST['email'];

if($username == "" or $userame == " ") {
	header("Location: login.php?e=12");
	die();
}
if($password == "" or $confirm == "" or $password == " " or $confirm == " ") {
	header("Location: login.php?e=13");
	die();
}
if($email == "" or $email == " ") {
	header("Location: login.php?e=14");
	die();
}
if($password !== $confirm) {
	header("Location: login.php?e=7");
	die();
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	header("Location: login.php?e=8");
	die();
}

$db = connectDB($dbUser, $dbPass, $dbName);
if ($db instanceof PDOException) {
	die ($db->getMessage());
}
$query = "SELECT count(*) FROM `Users` WHERE username = :username";
$stmt = $db->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();
$row = $stmt->fetch();
foreach($row as $value) {
	if($value != 0) {
		//Username taken
		header("Location: login.php?e=10");
		die();
	}
	break;
}
$query = "SELECT count(*) FROM `Users` WHERE email = :email";
$stmt = $db->prepare($query);
$stmt->bindParam(':email', $email);
$stmt->execute();
$row = $stmt->fetch();
foreach($row as $value) {
	if($value != 0) {
		//Email taken
		header("Location: login.php?e=9");
		die();
	}
	break;
}
$hash = secureHash($username, $password);
$ip = $_SERVER['REMOTE_ADDR'];

//Add user to table
$query = "INSERT INTO `Users` (`username`,`password`,`created`,`ip`,`access`,`email`) VALUES (?,?,NOW(),?,?,?)";
$stmt = $db->prepare($query);
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $hash);
$stmt->bindParam(3, $ip);
$stmt->bindParam(4, false);
$stmt->bindParam(5, $email);
$stmt->execute();

//ToDo: Send email with link, will follow

header("Location: login.php?e=11");
die();
?>
