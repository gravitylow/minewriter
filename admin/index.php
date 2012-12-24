<?php require("../functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
	<?php headIncludesSubFolders(); ?>
  </head>
  <body>
    <?php subFolderNavigation(); ?>
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Admins <small>Admin Control Panel</small></h1>
          </div class="admin"> 
        	      <form class="form-horizontal">
      <form class="form-horizontal">
    <fieldset>
      <div id="legend" class="">
        <legend class="">Admin Login</legend>
      </div>
    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Username</label>
          <div class="controls">
            <input type="text" placeholder="Username" class="input-xlarge">
            <p class="help-block">Your username</p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Password</label>
          <div class="controls">
            <input type="password" placeholder="Password" class="input-xlarge">
            <p class="help-block">Your password</p>
          </div>
        </div>

    <div class="control-group">

          <!-- Text input-->
          <label class="control-label" for="input01">Key</label>
          <div class="controls">
            <input type="text" placeholder="Key" class="input-xlarge">
            <p class="help-block">Your special key</p>
          </div>
        </div>

    <div class="control-group">
          <label class="control-label"></label>

          <!-- Button -->
          <div class="controls">
            <button class="btn btn-default">Login</button>
          </div>
        </div>

    </fieldset>
  </form>
      </div>
      </div>
  </body>
</html>
