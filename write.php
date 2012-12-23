<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>MineWriter <small>Author downloadable books for minecraft!</small></h1>
        </div> 
        <form name="myform" action="post.php" method="POST">
       <textarea rows="50" cols="60" onKeyPress="update(this.value);" onkeydown="update(this.value);"></textarea>
            </div>
        </form>
      </div>

  </body>
</html>
<script>
function update(str) {
}
</script>