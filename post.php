<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Post</title>
  <?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div class="container">
      <div class="content">
        <div class="page-header">
          <h1>Post <small>View your posted book!</small></h1>
        </div>
        	<h2 class="big">Post</h2>     
        	Page holder, we need auth here
        	We need some limitations
        	We need to use Sessions for page limiting
        	We need to open the DB connection with DEFINITE sanitation / formatting
      </div>
      </div><div class="footer">
      	<?php footer(); ?>
      </div>
    </div>
  </body>
</html>