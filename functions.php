<?php
session_start();
//Authentication functions
function isLoggedIn() {
	return isset($_SESSION['username']);
}

function loginLink() {
	if (isLoggedIn()) {
		return "<a href 'login.php'>Login</a>";
	} else {
		return "<a href 'signup.php'>Register</a>";
	}
}

//Page structure functions
function navigation() {
$parent = basename($_SERVER['PHP_SELF']);
?>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="index.php"><img src = "img/books.gif" class = "logo" /> MineWriter</a>
          <ul class="nav">
            <li <?php if ($parent == "index.php") {?>class="active"<?php } ?>><a href="index.php">Home</a></li>
            <li <?php if ($parent == "write.php") {?>class="active"<?php } ?>><a href="write.php">Write</a></li>
            <li <?php if ($parent == "browse.php") {?>class="active"<?php } ?>><a href="browse.php">Browse</a></li>
            <li <?php if ($parent == "about.php") {?>class="active"<?php } ?>><a href="about.php">About</a></li>
            <li <?php if ($parent == "contact.php") {?>class="active"<?php } ?>><a href="contact.php">Contact</a></li>
            <li <?php if ($parent == "team.php") {?>class="active"<?php } ?>><a href="team.php">Team</a></li>
          </ul>
          <ul class = "nav pull-right">
          	<li <?php if ($parent == "login.php" || $parent == "signup.php") {?>class="active"<?php } ?>><?php echo (loginLink()); ?></li>
          </ul>
        </div>
      </div>
    </div>
<?php } 
function headIncludes() {?>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/bootswatch/2.1.1/cerulean/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/2.0/css/font-awesome-more.css" rel="stylesheet">
<link href="css/def.css" rel="stylesheet">
<?php }


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

	$message = "Name: " . $name . "\nEmail: " . $email . "\nContent: " . $content
	mail($to,
		$subject,
		$message);
}

?>