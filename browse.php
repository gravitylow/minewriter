<?php
require("../private/config.php");
require("functions.php");

function require_multi($files) {
    $files = func_get_args();
    foreach($files as $file)
        require_once($file);
}

function connectDB($user, $pass, $db) {
    try {
        return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
    } catch(PDOException $ex) {
        return $ex;
    }

}


if (isset($_POST['author']) || isset($_POST['title']) || isset($_POST['date'])) {
	search();
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
        <input type="text" name="author" class="input-medium search-query" placeholder="Author">
        <input type="text" name="title" class="input-medium search-query" placeholder="Title">
        <input type="text" name="date" class="input-medium search-query" placeholder="Date">
        <button type="submit" class="btn">Search</button>
      </form>
      <div class="results">
        <?php
		function search() {
			global $dbUser, $dbPass, $dbName;
			$db = connectDB($dbUser, $dbPass, $dbName);
			if ($db instanceof PDOException) {
				die ($db->getMessage());
			}

			if(isset($_POST['author'])) {
				$query = "SELECT * FROM `Books` WHERE `Author` like :author LIMIT 10";
				$stmt = $db->prepare($query);
				$stmt->bindParam(':author', "%".$_POST['author']."%");
			} else if(isset($_POST['title'])) {
				$query = "SELECT * FROM `Books` WHERE `Title` like :title LIMIT 10";
				$stmt = $db->prepare($query);
				$stmt->bindParam(':title', "%".$_POST['title']."%");
			} else if(isset($_POST['date'])) {
				$query = "SELECT * FROM `Books` WHERE `Date` like :date LIMIT 10";
				$stmt = $db->prepare($query);
				$stmt->bindParam(':date', "%".$_POST['date']."%");
			}
			$stmt->execute();
			$rows = $stmt->fetch();
			//I assume $rows is a array with all the mysql results
			if(count($rows) == 0) {
				echo ("Sorry, we couldn't find anything for your search.");
				return;
			}
		?>
			<table class="table table-striped">
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
				$content = $row['Content'];
				$date = $row['Date'];
				$username = $row['Username'];
				$IP = $row['IP'];
				$license = $row['License'];
				$nsfw = $row['nsfw'];
				$flags = $row['Flags'];
				$genre = $row['genre'];
				$downloads = $row['downloads'];
				if ($downloads == "") {
					$downloads = 0;
				}
		?>
			<tr>
            	<td><?php echo $title; ?></td>
           	 	<td><?php echo $author; ?></td>
           	 	<td><?php echo $genre; ?></td>
           	 	<td><?php echo $date; ?></td>
            	<td><?php echo $downloads; ?></td>
            </tr>    
		<?php
			}
		?>
             </table>
        <?php     
		}
		?>
      </div>
    </div>
  </div>
  <?php footer(); ?>
</div>
</body>
</html>
