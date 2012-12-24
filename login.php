<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Login/Register</title>
  <?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Login <small>Login or Register here!</small></h1>
        </div>
        	<h2 class="big">Post</h2>     
        	<form action="someAction" method="POST">
        		Login/Register<br /><br />
        		Are you already a member? <input type="checkbox" value="checked"/>      		
        	</form>
      </div>
    </div>
    <?php footer(); ?>

  </body>
</html>