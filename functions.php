<?php
function navigation() {
$parent = basename($_SERVER['PHP_SELF']);
?>
    <div class="topbar">
      <div class="fill">
        <div class="container">
          <a class="brand" href="index.html">Book Writer</a>
          <ul class="nav">
            <li <?php if ($parent == "index.php") {?>class="active"<?php } ?>><a href="index.php">Home</a></li>
            <li <?php if ($parent == "write.php") {?>class="active"<?php } ?>><a href="write.php">Write</a></li>
            <li <?php if ($parent == "login.php" || $parent == "signup.php") {?>class="active"<?php } ?>><a href="login.php">Signup/Login</a></li>
            <li <?php if ($parent == "browse.php") {?>class="active"<?php } ?>><a href="browse.php">Browse</a></li>
            <li <?php if ($parent == "about.php") {?>class="active"<?php } ?>><a href="about.php">About</a></li>
            <li <?php if ($parent == "teamphp") {?>class="active"<?php } ?>><a href="team.php">Team</a></li>
          </ul>
        </div>
      </div>
    </div>
<?php } 
function headIncludes() {?>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.1.1/css/bootstrap.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/2.0/css/font-awesome-more.css" rel="stylesheet">
<link type="text/css" href="css/custom-theme/jquery-ui-1.8.16.custom.css" rel="stylesheet" />
<link href="css/def.css" rel="stylesheet">
<?php }
?>
