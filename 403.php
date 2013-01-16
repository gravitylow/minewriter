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
         <?php if ($err != "book") { ?> <h1>403 <small>You don't have permission to do that.</small></h1>
         	<?php } else { ?><h1>Book inaccessible <small>This book is not yet available for public reading.</small></h1><?php } ?>
        </div>      
         <?php if ($err != "book") { ?><p>Sorry, but you do not have permission to access this page.</p><?php } else { ?><p>Sorry, but that book is not accessible to the public. It may be awaiting approval or under review.</p><?php } ?>
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
