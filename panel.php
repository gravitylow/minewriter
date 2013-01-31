<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Account Panel</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Panel <small>Manage your account!</small></h1>
        </div>
        <div class = "well well-small" style = " width: 520px;">
           <h4 style = "padding-left: 10px;"><i class="icon-user"></i> Account Details: <small>gomeow</small></h4>
           <div style = "padding-left:25px;">
           		<button class = "btn btn-warning"><i class="icon-lock"></i> Change Password</button>
           </div>
        </div>
        <div class = "well well-small" style = " width: 520px;">
           <h4 style = "padding-left: 10px;"><i class="icon-user"></i> Adminy Things</h4>
           <div style = "padding-left:25px;">
           <button class = "btn btn-danger"><i class="icon-warning-sign"></i> SHUT DOWN SITE</button> 
           </div>
        </div>
      </div>
    </div>
      	<?php footer(); ?>

  </body>
</html>
