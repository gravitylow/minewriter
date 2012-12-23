<?php
function navigation() {
$parent = $_SERVER['PHP_SELF'];
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
<?php } ?>
