<?php
require("functions.php"); 
require("../private/config.php");

function connectDB($user, $pass, $db) {
	try {	
		return(new PDO("mysql:host=localhost;dbname=" . $db . ";charset=utf8", $user, $pass));
	} catch(PDOException $ex) {
		return $ex;
	}	
}

$db = connectDB($dbUser, $dbPass, $dbName);
if ($db instanceof PDOException) {
	die ($db->getMessage());
}
$booksAmt = 0;
$query = "SELECT * FROM `Stats` WHERE 1";
$stmt = $db->prepare($query);
$stmt->execute();
$row = $stmt->fetch();
$booksAmt = $row['BookCount'] -1;

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">   
    <div class="content">
		<div class="leaderboard" style = "position: relative">  
		<h1>MineWriter</h1>  
			<p>Try out our user friendly authoring service!</p>
			<p>Over <?php echo($booksAmt); ?> books written so far!</p>  
			<p><a href="write.php" class="btn btn-primary">Try now!</a></p> 
			<a class="thumbnail" href="#" style = "position: absolute; right: 25px; top: 30px;">
			<img alt="260x180" src="http://i.imgur.com/0RWRs.png" style="width: 438px; height: 192px;" ></a>
		</div>  				
		<div class="row">
		  <div class="span9">
		    <h2>About the project</h2>
		    <div class="row">
		      <div class="span7">
		      	<ul> 
		      		<li><p>MineWriter was started on December, 20th 2012</p></li>
		      		<li><p>Our aim is to provide a fun way for creative writers to bring their work to any server</p></li>
		      		<li><p>Both MineWriter and MineReader are open-source and we welcome contributors</p></li>
		      	</ul>
		      </div>
		      <div class="span2">		      
		      </div>
		    </div>
		  </div>
		</div>
		<?php divider(); ?>
        <div class="row"> 
        	<div class="span4">  
				<h2>Server Owners</h2>  
					<p>We want to make it as easy as possible for your players to author books and get them onto your server. Using the Bukkit plugin called MineReader, your players can get any book they want in game, it's that easy!</p>  
					<p><a class="btn btn-primary" href="http://dev.bukkit.org/server-mods/minereader/">Get the plugin</a></p>  
			</div>  
			<div class="span4">  
				<h2>Regular Players</h2>  
					<p>Writing books and bringing them onto your favorite server is now easier then ever! If the server you play on doesn't have MineReader, suggest it to them! :D</p>  
					<br /><p><a class="btn btn-primary" href="tutorial.php">Read the tutorial</a></p>  
			</div>  
			<div class="span4">  
				<h2>Developers</h2>  
					<p>Any developer is welcome to help us improve our website and minereader plugin, both are open sourced and on github</p>  
					<br /><br /><p><a class="btn btn-primary" href="devs.php">Visit the API page</a></p>  
			</div>	
        </div> 	
        <?php divider(); ?>       
    </div>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>
