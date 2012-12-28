<?php req() ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter</title>
	<?php headIncludesURL(); ?>
  </head>
  <body>
    <?php subFolderNavigationURL(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
         <?php if ($err != "book") { ?> <h1>404 <small>We couldn't find that page :(</small></h1>
         	<?php } else { ?><h1>Unknown book <small>We couldn't find that book :(</small></h1><?php } ?>
        </div>      
         <?php if ($err != "book") { ?><p>Sorry, but that page could not be found on the server</p><?php } else { ?><p>Sorry, but that book could not be found in our database. It could have been deleted for violating the ToS or it may not have existed in the first place. You may wish to <a href = "browse.php">browse</a> instead.</p><?php } ?>
            </div>
           
            	
       
      </div>
      <?php footerURL(); ?>
  </body>
</html>
<?php 
function req() {
	//Without this, 404ing inside a directory messes up CSS
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include "$root/functions.php";
}
?>