<?php
require("../private/config.php");
/*
 * Script stub for login
 */
$username = $_POST['username'];
$password = $_POST['password'];
$hash = secureHash($username, $password); //This is a private function for security reasons
$query = "SELECT * FROM milky_minewriter.Users WHERE username = :user AND password = :password;";
$stmt = $db->prepare($query);
$stmt->bindParam(':user', $username);
$stmt->bindParam(':password', $password);
$stmt->execute();
$row = $stmt->fetch();
if ($row['id'] == null) {
	header("Location: login.php?e=1");
	die();
}
session_start();
$_SESSION['username'] = $username;
$_SESSION['id'] = $row['id'];
$_SESSION['access'] = $row['access'];
header("Location: index.php");
die();
?>
