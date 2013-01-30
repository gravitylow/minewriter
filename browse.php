<?php
require("../private/config.php");
require("functions.php");

function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}
}
?>
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
      <h2 class="big">Search</h2>
      <form method="post" class="form-search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" value = "<?php echo ($_POST['author']); ?>" name="author" class="input-medium search-query" placeholder="Author">
        <input type="text" name="title" value = "<?php echo ($_POST['title']); ?>" class="input-medium search-query" placeholder="Title">
        <input type="text" name="genre" value = "<?php echo ($_POST['genre']); ?>" class="input-medium search-query" placeholder="Genre">
        <input type="text" name="results" value = "<?php echo ($_POST['results']); ?>" class="input-medium search-query" placeholder="# of results">
        <button type="submit" class="btn">Search</button>
      </form>
      <div class="results">
        <?php
        $author = $_POST['author'];
	$title = $_POST['title'];
	$limit = $_POST['limit'];
	$genre = $_POST['genre'];
        if (isset($author) || isset($title) || isset($genre)) {
			$db = connectDB($dbUser, $dbPass, $dbName);
			if ($db instanceof PDOException) {
				die($db->getMessage());
			}
			$num_results = $_POST['results'];
			if(isset($num_results) && is_int($num_results)) {
				$num_results = (int) $num_results;
				if ($num_results < 0 || $num_results > 101) {
					$num_results = 10;
				}
					
			} else {
				$num_results = 10;	
			}
			
			if(isset($author)) { //ISSET will check it's not null
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author LIMIT $num_results";
				$stmt = $db->prepare($query);
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($_POST['title']) && !is_null($_POST['title'])) {
				$query = "SELECT * FROM `Books` WHERE `Title` LIKE :title LIMIT $num_results";
				$stmt = $db->prepare($query);
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($_POST['genre']) && !is_null($_POST['genre'])) {
				$query = "SELECT * FROM `Books` WHERE `genre` LIKE :genre LIMIT $num_results";
				$stmt = $db->prepare($query);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else {
				echo "Test";
				return;
			}
			//echo($stmt->debugDumpParams());
			$stmt->execute();
			$rows = $stmt->fetchAll();
			//print_r($rows);			
			if ($stmt->rowCount() == 0) {
				echo 'Nothing found';
				return;
			}

		?>
		<table class="table table-striped table-hover">
            		<tr style="font-weight: bold;">
        			<td>Title</td>
        			<td>Author</td>
                    <td>Genre</td>
                    <td>Date created</td>
                    <td>Downloads</td>
     		 	</tr>
     		 <?php
            		foreach($rows as $row) {
              		 	$title = $row['Title'];			
               			$author = $row['Author'];
               			$genre = $row['genre'];
              			 $date = $row['Date'];
               			$downloads = $row['downloads'];		
		?>
			<tr onclick="document.location='read.php?id=<?php echo $row['ID'] ?>';">
            	<td><?php echo $title; ?></td>
           	 	<td><?php echo $author; ?></td>
           	 	<td><?php echo $genre; ?></td>
           	 	<td><?php echo $date; ?></td>
            	<td><?php echo $downloads; ?></td>
            </tr>    
		<?php
            		}
		}
		?>
             </table>
      </div>
    </div>
  </div>
  <?php footer(); ?>
</div>
</body>
</html>
