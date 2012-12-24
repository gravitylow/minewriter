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
        	    Login<br /><br />
        	    <form action="adminVerify.php" method="POST">
        	    	UserName:<br />
        	    	<input type="text"/><br />
        	    	PassWord:</br />
        	    	<input type="password" />
        	    </form>
        </div>
      </div>
  </body>
</html>
