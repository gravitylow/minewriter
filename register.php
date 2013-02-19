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
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
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
$hash = secureHash($username, $password); //Used as password
$code = getRegCode(); //Used for activation link
$ip = $_SERVER['REMOTE_ADDR'];

//Add user to table
//WAITING FOR COLUMN `code` FOR THE ACTIVATION CODE $code
$query = "INSERT INTO `Users` (`username`,`password`,`created`,`ip`,`access`,`email`) VALUES (?,?,NOW(),?,false,?)";
$stmt = $db->prepare($query);
$stmt->bindParam(1, $username);
$stmt->bindParam(2, $hash);
$stmt->bindParam(3, $ip);
$stmt->bindParam(4, $email);
$stmt->execute();

//Send email with verification link
$link = "http://minewriter.net/verify.php?e=".$email."&c=".$code."";
$mailtext = '<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>MineWriter</title>
</head>
<body>

<h4>Verifiy your E-mail!</h4>
<p>You successfully registered for MineWriter. To activate your account, please click on this link or paste it into your browser.<br>
<a href="'.$link.'">'.$link.'</a><br><br>
Thanks and enjoy writing!<br>
The MineWriter-Team</p>

</body>
</html>';
$header  = "MIME-Version: 1.0\r\n";
$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
$header .= "From: no-reply@minewriter.net\r\n";
$header .= "Reply-To: team@minewriter.net\r\n";
//$header .= "X-Mailer: PHP ". phpversion();
$subject = "Your MineWriter account";

mail($email, $subject, $mailtext, $header);


header("Location: login.php?e=11");
die();
?>
