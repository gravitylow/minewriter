<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Write</title>
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
       <textarea style = "width: 600px; height: 740px; border: 0; background-image: url('img/book.png');" onKeyPress="update(this.value);" onkeydown="update(this.value);"></textarea>
            </div>
        </form>
      </div>

  </body>
</html>
<script>
function update(str) {
}
</script>
