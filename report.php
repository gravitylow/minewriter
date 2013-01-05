<?php
require("../private/config.php");
require("functions.php");



function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		die($user);
		return $ex;
	}
	
}


function hasHtml($str){
  if(strlen($str) != strlen(strip_tags($str))) {
      return true;
	}
  else {	 
  	return false;
  }
}
	$subject = "MineWriter Report";
	$to = "team@minewriter.net";
	$email = $_POST['email'];
	$name = $_POST['name'];
	$id = $_POST['id'];
	$content = $_POST['reason'];
	$flags = $_POST['flags'];
	if($flags < 0) {
		$flags = 1;
	}
	else {
		$flags = $flags + 1;
	}
	
			
		
	$db = connectDB($dbUser, $dbPass, $dbName);
	if ($db instanceof PDOException) {
		die ($db->getMessage());
	}
	$sql = "UPDATE Books SET Flags=':flags' WHERE ID=':id'";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':id', $id);
	$stmt->bindParam(':flags', $flags);
	$stmt->execute();
	
	
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		?><script type="text/javascript">
			window.alert("Invalid email, it must be example@domain.com");
			history.go(-1);
		</script>
		<?php
		return;
	}
	if($name == null || $email == null) {
		?><script type="text/javascript">
			window.alert("Please fill in a name and/or email.");
			history.go(-1);
		</script>
		<?php
		return;
	}
	if(hasHtml($content) || hasHtml($email) || hasHtml($name)) {
		?><script type="text/javascript">
			window.alert("You cannot use HTML in this form!");
			history.go(-1);
		</script>
		
		<?php
		return;
	}
	$message = "Name: " . $name . "\nEmail: " . $email . "\nID: " . $id . "\nReason: " . $content;
	mail($to,
		$subject,
		$message);
		?>
		<script type="text/javascript">
			window.alert("Reported!");
			history.go(-1);
		</script>
		<?php
		
?>