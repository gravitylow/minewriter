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
          <h1>Write <small>Submit your book here!</small></h1>
        </div> 
        <form name="myform" action="post.php" method="POST">
       <textarea rows="40" cols="80" onKeyPress="update(this.value);" onkeydown="update(this.value);"></textarea>
            </div>
        </form>
      </div>

  </body>
</html>
<script>
function update(str) {
}
</script>
