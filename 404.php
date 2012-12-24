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
          <h1>404 <small>We couldn't find that page :(</small></h1>
        </div>      
        <p>Sorry, but that page could not be found on the server</p>
            </div>
            <div class="footer">
            	<?php footerURL(); ?>
            </div>
      </div>
  </body>
</html>
<?php 
function req() {
	//Without this, 404ing inside a directory messes up CSS
	$root = realpath($_SERVER["DOCUMENT_ROOT"]);
	include "$root/functions.php";
}
?>