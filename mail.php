function hasHtml($str){
  if(strlen($str) != strlen(strip_tags($str))) {
      return true;
	}
  else {	 
  	return false;
  }
}



function contactMail() {
	$subject = "MineWriter Contact Results";
	$to = "webmaster@aeroplanearea.us";

	$name = $_POST['name'];
	$email = $_POST['email'];
	if(!preg_match('/^([0-9a-zA-Z]([-.\w]*[0-9a-zA-Z])*@([0-9a-zA-Z][-\w]*[0-9a-zA-Z]\.)+[a-zA-Z]{2,9})$/',$_POST['email'])) {
		?><script type="text/javascript">
			window.alert("Invalid email proved, the email must be in valid email format (such as name@domain.com).");
		</script><?php
		return;
	}
	if(!preg_match('/^[-_ 0-9a-z]$/i',$_POST['name'])) {
		?><script type="text/javascript">
			window.alert("Invalid name, the name may only contain a-z, A-Z, 0-9, "-", "_" and spaces.");
		</script><?php
		return;
	}
	$content = $_POST['content'];
	if(hasHtml($content)) {
		?><script type="text/javascript">
			window.alert("You cannot use Html in this!");
		</script><?php
		return;
	}

	$message = "Name: " . $name . "\nEmail: " . $email . "\nContent: " . $content;
	mail($to,
		$subject,
		$message);
}