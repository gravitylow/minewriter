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
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();
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
        <select size='1' name = "genre">
          		<?php if($detect->isiOS()) {?><option disabled="disabled">Genre</option><?php } else { ?><optgroup label='Genre'><?php } ?>
					<option value = "">Any</option>
					<option>Action and Adventure</option>
					<option>Chick Lit</option>
					<option>Children&#39;s</option>
					<option>Contemporary</option>
					<option>Crime</option>
					<option>Family Saga</option>
					<option>Fantasy</option>
					<option>Dark Fantasy</option>
					<option>General Fiction</option>
					<option>Historical Fiction</option>
					<option>Horror</option>
					<option>Humour</option>
					<option>Literary Fiction</option>
					<option>Lyrics</option>
					<option>Military and Espionage</option>
					<option>Multicultural</option>
					<option>Mystery</option>
					<option>Non-fiction</option>
					<option>Religious and Inspirational</option>
					<option>Romance</option>
					<option>Science Fiction</option>
					<option>Short Story Collections</option>
					<option>Thrillers and Suspense</option>
					<option>Western</option>
					<option>Young Adult</option>
					<option>Other</option>
          		<?php if(!$detect->isiOS()) { ?></optgroup><?php } ?>
          	</select>
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
			if(!isset($author) && !isset($genre) && !isset($title)) { //ISSET will check it's not null
				//No blanks filled
				$query = "SELECT * FROM `Books` LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books`");
			}
			if(isset($author) && !isset($genre) && !isset($title)) {
				//Author field filled
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Author` LIKE :author");
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$count->bindValue(':author', $author.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($title) && !isset($author) && !isset($genre)) {
				//Title field filled
				$query = "SELECT * FROM `Books` WHERE `Title` LIKE :title LIMIT $p,$num_results";
				$stmt = $db->prepare($query);
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Title` LIKE :title");				
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$count->bindValue(':title', $title.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($genre) && !isset($author) && !isset($title)) {
				//Genre field filled
				$query = "SELECT * FROM `Books` WHERE `genre` LIKE :genre LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `genre` LIKE :genre");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				$count->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				//$stmt->bindValue(':limit', $num_results, PDO::PARAM_INT);
			} else if(isset($author) && isset($title) && !isset($genre)) {
				//Author and Title fields filled
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author AND `Title` LIKE :title LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Author` LIKE :author AND `Title` LIKE :title");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$count->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$count->bindValue(':title', $title.'%', PDO::PARAM_STR);
			} else if(isset($author) && !isset($title) && isset($genre)) {
				//Author and Genre fields filled
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author AND `genre` LIKE :genre LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Author` LIKE :author AND `genre` LIKE :genre");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				$count->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$count->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
			} else if(!isset($author) && isset($title) && isset($genre)) {
				//Title and Genre fields filled
				$query = "SELECT * FROM `Books` WHERE `Title` LIKE :title AND `genre` LIKE :genre LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Title` LIKE :title AND `genre` LIKE :genre");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				$count->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$count->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
			} else if(isset($author) && isset($title) && isset($genre)) {
				//All fields filled
				$query = "SELECT * FROM `Books` WHERE `Author` LIKE :author AND `Title` LIKE :title AND `genre` LIKE :genre LIMIT $p,$num_results";
				$count = $db->prepare("SELECT count(distinct `id`) FROM `Books` WHERE `Author` LIKE :author AND `Title` LIKE :title AND `genre` LIKE :genre");
				$stmt = $db->prepare($query);
				$stmt->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$stmt->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$stmt->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
				$count->bindValue(':author', $author.'%', PDO::PARAM_STR);
				$count->bindValue(':title', $title.'%', PDO::PARAM_STR);
				$count->bindValue(':genre', $genre.'%', PDO::PARAM_STR);
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
		<?php }
		} ?>
             </table>
             <ul class="pager">
    		<li class="previous <?php if ($pn == 1) { ?>disabled<?php } ?>">
    			<?php
    				$p1 = (int) $pn;
    		    		$p1--;
    		    		$p2 = (int) $num_results;
    				$_GET['p'] = $p1 * $p2;
    			?>
    			<a href="browse.php?<?php echo (http_build_query($_GET)); ?>">&larr; Previous</a>
    		</li>
    		<li class="next <?php if ($pn == $totalPages) { ?>disabled<?php } ?>">
    		    	<?php
    		    		$p1 = (int) $pn;
    		    		//$p1++;
    		    		$p2 = (int) $num_results;
    				$_GET['p'] = $p1 * $p2;
    			?>
    			<a href="browse.php?<?php echo (http_build_query($_GET)); ?>">Next &rarr;</a>
    		</li>
    	    </ul>
             <p><em>Found <?php echo ($totalNum); ?> results, spanning <?php echo ($totalPages); ?> pages. Page <?php echo($pn); ?>/<?php echo ($totalPages); ?>.</em></p>
      </div>
    </div>
  </div>
  <?php footer(); ?>
</div>
</body>
</html>
