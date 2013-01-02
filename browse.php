<?php
function require_multi($files) {
    $files = func_get_args();
    foreach($files as $file)
        require_once($file);
}
?>
<?php require_multi("functions.php", "../private/config.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Browse</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Browse <small>Discover other MineWriter books!</small></h1>
        </div> 
        	<form method="post" class="form-search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	        	<input type="text" name="author" class="input-medium search-query" placeholder="Author">
	        	<input type="text" name="title" class="input-medium search-query" placeholder="Title">
	        	<input type="text" name="date" class="input-medium search-query" placeholder="Date">
	        	<button type="submit" class="btn">Search</button>
	        	</form>
            </div>
    </div><?php footer(); ?>
  </body>
</html>
<?php
// DO a DB search and make it pretty :D
function search() {
	pageRedirect("404.php?err=book");
}

?>