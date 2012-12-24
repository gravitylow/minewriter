<?php

function hasHtml($str){
  if(strlen($str) != strlen(strip_tags($str))) {
      return true;
	}
  else {	 
  	return false;
  }
}
	$subject = "MineWriter Contact Results";
	$to = "team@minewriter.net";
	$name = $_POST['name'];
	$email = $_POST['email'];
	$content = $_POST['content'];
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		?><script type="text/javascript">
			window.alert("Invalid email, it must be example@domain.com");
		</script>
		<meta http-equiv="Refresh" content="1; url=http://www.minewriter.net/contact.php">
		<?php
		return;
	}
	if($name == null) {
		?><script type="text/javascript">
			window.alert("Invalid name, the name may only contain a-z, A-Z, 0-9, \"-\", \"_\" and spaces.");
		</script>
		<meta http-equiv="Refresh" content="1; url=http://www.minewriter.net/contact.php">
		<?php
		return;
	}
	if(hasHtml($content) || hasHtml($email) || hasHtml($name)) {
		?><script type="text/javascript">
			window.alert("You cannot use Html in this form!");
		</script>
		<meta http-equiv="Refresh" content="1; url=http://www.minewriter.net/contact.php">
		<?php
		return;
	}
	$message = "Name: " . $name . "\nEmail: " . $email . "\nContent: " . $content;
	mail($to,
		$subject,
		$message);
		?>
		<meta http-equiv="Refresh" content="0; url=http://www.minewriter.net/contact.php">
		<script type="text/javascript">
			window.alert("Success");
		</script>
		<?php
		
?>