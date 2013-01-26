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
		<?php
		return;
	}
	if($name == null) {
		?><script type="text/javascript">
			window.alert("Invalid name, the name may only contain a-z, A-Z, 0-9, \"-\", \"_\" and spaces.");
		</script>
		<?php
		return;
	}
	if($content == null) {
		?><script type="text/javascript">
			window.alert("Invalid content, the name may only contain a-z, A-Z, 0-9, \"-\", \"_\" and spaces.");
		</script>
		<?php
		return;
	}
	if(hasHtml($content) || hasHtml($email) || hasHtml($name)) {
		?><script type="text/javascript">
			window.alert("You cannot use HTML in this form!");
		</script>
		
		<?php
		return;
	}
	$message = "Name: " . $name . "\nEmail: " . $email . "\nContent: " . $content;
	mail($to,
		$subject,
		$message);
		?>
		<script type="text/javascript">
			window.alert("Success");
			$("#contact").reset();
		</script>
		<?php
		
?>
