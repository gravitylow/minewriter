<?php 
require("../private/config.php");
//Functions
function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}
	
}


$ID=$_GET['id'];
/*
Error Codes:
100 - Database connection failed
101 - No ID, Author null
102 - No ID, Title null
103 - Table selection failed
104 - No / Invalid File Type
105 - No results found
*/
$db = connectDB($dbUser, $dbPass, $dbName);
if ($db instanceof PDOException) {
	die ($db->getMessage());
}				
$sql = "SELECT * FROM `Books` WHERE `ID` = :id LIMIT 1"; 
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $ID);
$stmt->execute();
$row = $stmt->fetch();
		if ($row['ID'] == null) {
			$err = "book";
			require("404.php");
			die();
		}
require("functions.php"); 
$title = $row['Title'];
$author = $row['Author'];
$content = $row['Content'];
$date = $row['Date'];
$license = $row['License'];
$nsfw = $row['nsfw'];
$flags = $row['Flags'];
$genre = $row['genre'];
$downloads = $row['downloads'];
if ($downloads == "") {
	$downloads = 0;
}

?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reading <?php echo ($title); ?></title>
	<?php headIncludes(); ?>
	<script type = "text/javascript" src = "http://code.jquery.com/jquery.min.js"></script>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Reading book <small><?php echo($title); ?></small></h1>
        </div> 
        <div name="myform" style = "position: relative;">
          
            <div class = "well" style = "position: absolute; right: 0; width: 220px;">
            <?php topHeader("Book info"); ?>
          	<strong><?php echo $title; ?></strong>
          	<br />
          	<strong>by <?php echo $author; ?></strong><br />
          	<br />
          	<strong>License: </strong><?php echo $license; ?>
          	<br />
          	<strong>Created: </strong><?php echo $date; ?>
          	<br />
          	<strong>Downloads: </strong><?php echo $downloads; ?>
	<br />
	<br />
	<center><a href="#myModal" role="button" class="btn btn-danger" data-toggle="modal"><i class = "icon-flag"></i> Report content</a></center>
          
          </div>
          
           
          
            <div class = "well" style = "position: absolute; right: 0; top: 260px; width: 220px;">
          <?php topHeader("Staff tools"); ?>
          <form method="POST" action="someForm.php">
          	<center><button type="button" class="btn btn-warning" width="130"><i class = "icon-minus-sign"></i> Hide Book</button><br /><br />
          	<button type="button" class="btn btn-danger" width="130"><i class = "icon-trash"></i> Delete Book</button><br /></center>
          </form>
          </div>
          
       <?php if ($nsfw == '1') { ?><div id = "notice" class = "alert alert-block alert-error" style = "width: 470px;">This content may not be suitable for all users, as flagged by the author. Click the button below to read this content. Remember that it may include explicit, violent or disturbing content:<br />
       	<br /><a href="#" id = "nbtn" role="button" class="btn btn-danger" onclick = 'showNSFW()'><i class = "icon-exclamation-sign"></i> Show this content</a>
       </div><?php }
       		if($flags > 0) { ?>
       			<div id = "notice" class = "alert alert-block alert-error" style = "width: 470px;">
       				Warning: This book has <?php echo($flags) ?> flag<?php if($flags != 1) {echo("s");}?>!
       			</div>
       <?php } ?>
       
       <textarea class = "book" id = "writing" name = "bookContent" style = "cursor: default !important; <?php if ($nsfw == '1') { ?>visibility: hidden;<?php } ?>" readonly><?php echo ($content); ?></textarea>
       
          <br /> 
        </div>
      </div>
	</div><br />
	<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	<h3 id="myModalLabel">Report content</h3>
</div>
<div class="modal-body">
	<p>Thanks for keeping MineWriter free of illegal and inappropriate content. To proceed, please fill out the form below.</p>
<form class="form-horizontal" id="report" action="report.php" method="POST">
	<input type="hidden" name="id" value="<?=$ID?>" /><!-- Pass the id -->
	<input type="hidden" name="s" value="<?=$flags?>" /><!-- Pass the flags -->
	<div class="control-group">
		<label class="control-label" for="inputName">Name:</label>
		<div class="controls">
			<input type="text" id="inputName" placeholder="Name" name = "name">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputName">Email:</label>
		<div class="controls">
			<input type="text" id="inputName" placeholder="Email" name = "email">
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="inputName">Reason:</label>
		<div class="controls">
			<input type="text" id="inputName" placeholder="Reason" name = "reason">
		</div>
	</div>
	<div class="control-group">
		<div class="controls">
			<button type="submit" class = "btn btn-success">Report</button>
		</div>
	</div>
</form>
</div>

</div>
<script>
function getCaret(node) {
  if (node.selectionStart) {
    return node.selectionStart;
  } else if (!document.selection) {
    return 0;
  }

  var c = "\001",
      sel = document.selection.createRange(),
      dul = sel.duplicate(),
      len = 0;

  dul.moveToElementText(node);
  sel.text = c;
  len = dul.text.indexOf(c);
  sel.moveStart('character',-1);
  sel.text = "";
  return len;
}
$("#writing").keydown(function(e){


});

function showNSFW() {
	$("#notice").slideUp();
	$("#writing").css("visibility","visible");
	
	
}
</script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>

	<?php footer(); ?>
  </body>
</html>

