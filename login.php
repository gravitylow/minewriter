<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter Login</title>
  <?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Login <small>Access your MineWriter panel</small></h1>
        </div>
        	<!--Post info to some php on the page to handle registration-->
        	<form class="form-horizontal" action="loginScript.php" method="POST">
		  <fieldset>
		    <div id="legend">
		      <legend class="">Login</legend>
		    </div>
		    <?php if ($_GET['e'] == 1) {?><div class = "alert-error alert"><i class = "icon-lock"></i> Incorrect username or password.</div><?php } ?>
		    <?php if ($_GET['e'] == 2) { if ($_GET['reason'] == "") { $_GET['reason'] = 'SW5hcHByb3ByaWF0ZSBjb25kdWN0'; }?><div class = "alert-error alert"><i class = "icon-ban-circle"></i> You have been banned: <?php echo (strip_tags(base64_decode($_GET['reason']))); ?></div><?php } ?>
		    <?php if ($_GET['e'] == 3) {?><div class = "alert-error alert"><i class = "icon-envelope"></i> Please verify your email address before logging in.</div><?php } ?>
		    <?php if ($_GET['e'] == 4) {?><div class = "alert-success alert"><i class = "icon-check"></i> Your email address has been verified. You may now login.</div><?php } ?>
		     <?php if ($_GET['e'] == 5) {?><div class = "alert-success alert"><i class = "icon-signout"></i> You have been successfully logged out.</div><?php } ?>
		    <div class="control-group">
		      <label class="control-label" for="username">Username</label>
		      <div class="controls">
		        <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge">
		        <!--TODO: Add link for account recovery-->
		        <p class="help-block">Forget your username?</p>
		      </div>
		    </div>
		 
		 
		    <div class="control-group">
		      <!-- Password-->
		      <label class="control-label" for="password">Password</label>
		      <div class="controls">
		        <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
		        <!--TODO: Add link for account recovery-->
		        <p class="help-block">Forget your password?</p>
		      </div>
		    </div>
		 
		    <div class="control-group">
		      <div class="controls">
		      	<!--Login-->
		        <button class="btn btn-success">Login</button>
		      </div>
		    </div>
		  </fieldset>
		</form>		
		<form class="form-horizontal" action="registerScript.php" method="POST">
		  <fieldset>
		    <div id="legend">
		      <legend class="">Register</legend>
		    </div>
		    <?php if ($_GET['e'] == 7) {?><div class = "alert-error alert"><i class = "icon-warning-sign"></i> Passwords do not match.</div><?php } ?>
		    <?php if ($_GET['e'] == 8) {?><div class = "alert-error alert"><i class = "icon-warning-sign"></i> Invalid email address given.</div><?php } ?>
		    <?php if ($_GET['e'] == 9) {?><div class = "alert-error alert"><i class = "icon-warning-sign"></i> Email has already been used.</div><?php } ?>
		    <?php if ($_GET['e'] == 10) {?><div class = "alert-error alert"><i class = "icon-warning-sign"></i> Username is already taken.</div><?php } ?>
		    <?php if ($_GET['e'] == 11) {?><div class = "alert"><i class = "icon-check"></i> Your registration was succesful, please now confirm your email.</div><?php } ?>

		    <div class="control-group">
		      <label class="control-label" for="username">Username</label>
		      <div class="controls">
		        <input type="text" id="username" name="username" placeholder="Username" class="input-xlarge">
		        <p class="help-block">Username can contain any letters or numbers, without spaces</p>
		      </div>
		    </div>
		 
		    <div class="control-group">
		      <label class="control-label" for="email">E-mail</label>
		      <div class="controls">
		        <input type="text" id="email" name="email" placeholder="Email" class="input-xlarge">
		        <p class="help-block">Please provide your E-mail (Must be a valid E-mail)</p>
		      </div>
		    </div>
		 
		    <div class="control-group">
		      <label class="control-label" for="password">Password</label>
		      <div class="controls">
		        <input type="password" id="password" name="password" placeholder="Password" class="input-xlarge">
		        <p class="help-block">Password should be at least 6 characters</p>
		      </div>
		    </div>
		 
		    <div class="control-group">
		      <label class="control-label"  for="password_confirm">Password (Confirm)</label>
		      <div class="controls">
		        <input type="password" id="password_confirm" name="password_confirm" placeholder="Confirm Password" class="input-xlarge">
		        <p class="help-block">Please confirm your password</p>
		      </div>
		    </div>
		 
		    <div class="control-group">
		      <div class="controls">
		        <button class="btn btn-success">Register</button>
		      </div>
		    </div>
		  </fieldset>
		</form>

      </div>
    </div>
    <?php footer(); ?>

  </body>
</html>
