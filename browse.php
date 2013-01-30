<?php
$author = $_GET['author'];
$title = $_GET['title'];
$limit = $_GET['limit'];
$genre = $_GET['genre'];
$p = $_GET['p'];
if (is_numeric($p) && isset($p)) {
	$p = (int) $p;
	if ($p < 0) {
		$p = 0;
	}

} else {
	$p = 0;
}

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
      <form method="get" class="form-search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" value = "<?php echo ($author); ?>" name="author" class="input-medium search-query" placeholder="Author">
        <input type="text" name="title" value = "<?php echo ($title); ?>" class="input-medium search-query" placeholder="Title">
        <input type="text" name="genre" value = "<?php echo ($genre); ?>" class="input-medium search-query" placeholder="Genre">
        <select name = "limit">
        	<option value = "10" <?php if ($limit == "10" || !isset($limit)) { ?>selected = "selected"<?php } ?>>10 results</option>
        	<option value = "25" <?php if ($limit == "25") { ?>selected = "selected"<?php } ?>>25 results</option>
        	<option value = "50" <?php if ($limit == "50") { ?>selected = "selected"<?php } ?>>50 results</option>
        	<option value = "100" <?php if ($limit == "100") { ?>selected = "selected"<?php } ?>>100 results</option>
        </select>
        <button type="submit" class="btn">Search</button>
      </form>
      <div class="results">
        <?php
        if (isset($author) || isset($title) || isset($genre) || true) {
			$db = connectDB($dbUser, $dbPass, $dbName);
			if ($db instanceof PDOException) {
				die($db->getMessage());
			}
			$num_results = $limit;
			if(isset($num_results) && is_numeric($num_results)) {
				$num_results = (int) $num_results;
				if ($num_results < 0 || $num_results > 101) {
					$num_results = 10;
				}
					
			} else {
				$num_results = 10;	
			}
			//$ps = $p - $num_results;
			if ($p > 0) {
				$pn = $p / $num_results;
				$pn++;
			} else {
				$pn = 1;
			}
			if(!isset($author) && !isset($genre) && !isset($author)) {
				$query = "SELECT * FROM `Books` LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books`");
			}
			if(isset($author)) { //ISSET will check it's not null
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Author` LIKE :author");
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$count->bindValue(':author', $author.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($_POST['title']) && !is_null($_POST['title'])) {
				$query = "SELECT * FROM `Books` WHERE `Title` LIKE :title LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Title` LIKE :title");				
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$count->bindValue(':title', $title.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($_POST['genre']) && !is_null($_POST['genre'])) {
				$query = "SELECT * FROM `Books` WHERE `genre` LIKE :genre LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `genre` LIKE :genre");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				$count->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else {
				echo "Test";
				return;
			}
			//echo($stmt->debugDumpParams());
			$stmt->execute();
			$count->execute();
			$counter = $count->fetch();
			$totalNum = (float) $counter[0];
			$totalPages = $totalNum / $num_results;
			$totalPages = ceil($totalPages);
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
			<tr>
            	<td><a href = "read.php?id=<?php echo $row['ID'] ?>"><?php echo $title; ?></a></td>
           	 	<td><a href = "profile.php?user=<?php echo ($author); ?>"><?php echo $author; ?></a></td>
           	 	<td><?php echo $genre; ?></td>
           	 	<td><?php echo $date; ?></td>
            	<td><?php echo $downloads; ?></td>
            </tr>    
		<?php
            		}
		}
		?>
             </table>
             <p><em>Found <?php echo ($totalNum); ?> results, spanning <?php echo ($totalPages); ?> pages. Page <?php echo($pn); ?>/<?php echo ($totalPages); ?>.</em></p>
      </div>
    </div>
  </div>
  <?php footer(); ?>
</div>
</body>
</html>
