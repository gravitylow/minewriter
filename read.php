<?php require("functions.php"); ?>
<?php 

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
							
$sql = "SELECT * FROM `Books` WHERE `ID` = :id LIMIT 1"; 
$stmt = $db->prepare($sql);
$stmt->bindParam(':id', $ID);
$stmt->execute();
$row = $stmt->fetch();
		if ($row['ID'] == null) {
			die("105");
		}
$title = $row['title'];
$author = $row['author'];
$content = $row['content'];
$date = $row['created'];

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
          <h1>Reading book <small><?php echo ($title); ?></small></h1>
        </div> 
        <div name="myform" style = "position: relative;">
          
            <div class = "well" style = "position: absolute; right: 0; width: 220px;">
          	<strong><?php echo $title; ?></strong>
          	<br />
          	<strong>by <?php echo $author; ?></strong>
          	<br />
          	<strong>License: <?php echo $license; ?></strong>
          	<br />
          	<strong>Created: <?php echo $date; ?></strong>

          
          </div>
          
         
       <textarea class = "book" id = "writing" name = "bookContent" style = "" readonly><?php echo ($content);</textarea>
       
          <br /> 
        </div>
      </div>
	</div><br />
	<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Submission information</h3>
</div>
<div class="modal-body">
<p>To ensure all submissions are accessible, we require some information from you before we are able to add your entry to the database. Firstly, we ask for a title and author. These are displayed in-game, so make sure you consider them carefully. We also ask for a license which plays an important part in what other people are allowed to do with your book. </p>
</div>

</div>
	<?php footer(); ?>
  </body>
</html>
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
</script>
