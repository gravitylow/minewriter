<?php
session_start();
//Authentication functions
function isLoggedIn() {
	return isset($_SESSION['username']);
}

function loginLink() {
	if (isLoggedIn()) {
		return "<a href='panel.php'>Panel</a>";
	} else {
		return "<a href='login.php'>Register/Login</a>";
	}
}

function loginLinkSubFolder() {
	if (isLoggedIn()) {
		return "<a href='../panel.php'>Panel</a>";
	} else {
		return "<a href='../login.php'>Register/Login</a>";
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
			<li <?php if ($parent == "devs.php") {?>class="active"<?php } ?>><a href="devs.php">Developers</a></li>
		  </ul>
		  <ul class = "nav pull-right">
		  	<li <?php if ($parent == "login.php") {?>class="active"<?php } ?>><?php echo (loginLink()); ?></li>
		  </ul>
		</div>
	  </div>
	</div>
<?php } 

function divider() {
	?>
	<div id="legend">
		<legend class=""></legend>
	</div>
<?php }


function subFolderNavigation() {
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
		  <a class="brand" href="../index.php"><img src = "../img/books.gif" class = "logo" /> MineWriter</a>
		  <ul class="nav">
			<li><a href="../index.php">Home</a></li>
			<li><a href="../write.php">Write</a></li>
			<li><a href="../browse.php">Browse</a></li>
			<li><a href="../about.php">About</a></li>
			<li><a href="../contact.php">Contact</a></li>
			<li><a href="../team.php">Team</a></li>
			<li><a href="devs.php">Developers</a></li>
		  </ul>
		  <ul class = "nav pull-right">
		  	<li <?php if ($parent == "login.php") {?>class="active"<?php } ?>><?php echo (loginLinkSubFolder()); ?></li>
		  </ul>
		</div>
	  </div>
	</div>
<?php } 
function headIncludes() {?>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/bootswatch/2.1.1/cerulean/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome-more/2.0/css/font-awesome.css" rel="stylesheet">
<link href="css/def.css?<?php echo (time()); ?>" rel="stylesheet">
<?php }

function subFolderNavigationURL() {
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
		  <a class="brand" href="http://www.minewriter.net/index.php"><img src = "../img/books.gif" class = "logo" /> MineWriter</a>
		  <ul class="nav">
			<li><a href="http://www.minewriter.net/index.php">Home</a></li>
			<li><a href="http://www.minewriter.net/write.php">Write</a></li>
			<li><a href="http://www.minewriter.net/browse.php">Browse</a></li>
			<li><a href="http://www.minewriter.net/about.php">About</a></li>
			<li><a href="http://www.minewriter.net/contact.php">Contact</a></li>
			<li><a href="http://www.minewriter.net/team.php">Team</a></li>
			<li><a href="http://www.minewriter.net/devs.php">Developers</a></li>
		  </ul>
		  <ul class = "nav pull-right">
		  	<li <?php if ($parent == "login.php") {?>class="active"<?php } ?>><?php echo (loginLink()); ?></li>
		  </ul>
		</div>
	  </div>
	</div>
<?php } 
function headIncludesURL() {?>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<link href="//netdna.bootstrapcdn.com/bootswatch/2.1.1/cerulean/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome-more/latest/css/font-awesome.css" rel="stylesheet">
<link href="http://www.minewriter.net/css/def.css" rel="stylesheet">
<?php }

function headIncludesSubFolders() {?>
<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
<link href="//netdna.bootstrapcdn.com/bootswatch/2.1.1/cerulean/bootstrap.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome-more/2.0/css/font-awesome.css" rel="stylesheet">
<link href="../css/def.css" rel="stylesheet">
<?php }

function footerURL() {
?>
<div id="push"></div>
</div>
<div id="footer">
	<div class="container" style = "position: relative; top: 20px;">
	<p class="muted credit"><a href="tos.php">Terms of Service</a> | <a href="policy.php">Privacy Policy</a></p>
</div>
 <?php }

function footer() {
?>
<div id="push"></div>
</div>
<div id="footer">
	<div class="container" style = "position: relative; top: 20px;">
	<p class="muted credit"><a href="tos.php">Terms of Service</a> | <a href="policy.php">Privacy Policy</a></p>
</div>
<?php }

?>