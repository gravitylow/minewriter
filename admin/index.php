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
        	    <form class="form-inline">
        	    <input type="text" class="input-small" placeholder="Username" name="user">
        	    <input type="password" class="input-small" placeholder="Password" name="pass">
        	    <label class="checkbox">
        	    <input type="checkbox"> Remember me
        	    </label>
        	    <button type="submit" class="btn">Sign in</button>
        	    </form>
      </div>
      </div>
  </body>
</html>
