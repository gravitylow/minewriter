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
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Browse <small>Look at other MineWriter books!</small></h1>
        </div> 
        	<form method="post" class="form-search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	        	<input type="text" name="author" class="input-medium search-query" value="Author">
	        	<input type="text" name="title" class="input-medium search-query" value="Title">
	        	<input type="text" name="date" class="input-medium search-query" value="Date">
	        	<button type="submit" class="btn">Search</button>
	        	</form>
            </div>
      </div>
  </body>
</html>
<?php
// DO a DB search and make it pretty :D
function search() {
	//STUFF
}
function require_multi($files) {
    $files = func_get_args();
    foreach($files as $file)
        require_once($file);
}
?>