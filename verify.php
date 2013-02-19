<?php
if(!isset($_GET['e']) || !isset($_GET['c']))
	die("Invalid request.");

require("../private/config.php");
require("functions.php");

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

$email = filter_var($_GET['e'], FILTER_SANITIZE_EMAIL);
$code = $_GET['c'];

$stmt = $db->prepare("SELECT `email`, `code` FROM `Users` WHERE `email` = ? AND `code` = ?");
$stmt->bindParam(1, $email);
$stmt->bindParam(2, $code);
$stmt->execute();

if ($stmt->rowCount() == 0)
	die("You didn't register yet or your verification code was wrong.");

$stmt = $db->prepare("UPDATE `Users` SET `access` = true WHERE `email` = ?");
$stmt->bindParam(1, $email);
$stmt->execute();

header("Location: login.php?e=6");
die();
?>
