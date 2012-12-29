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
    <div id = "wrap">
    <div class="container">   
    <div class="content">
		<div class="leaderboard">  
		<h1>MineWriter</h1>  
		<p>Try out our user friendly authoring service!</p>  
		<p><a href="write.php" class="btn btn-success btn-large">Try now</a></p>  
		</div>  
		<div class="row" align="center">  
		
		<div class="span4">  
			<h2 class="small">Server Owners</h2>  
				<p>We want to make it as easy as possible for your players to author books and get them onto your server. Using the Bukkit plugin called MineReader, your players can easily get any book they want in game, with ease of use!</p>  
				<p><a class="btn btn-success btn-medium" href="#">Get the plugin</a></p>  
		</div>  
		<div class="span4">  
			<h2 class="small">Regular Players</h2>  
				<p>Writing books and bringing them onto your favorite server is now easier then ever!</p>  
				<p><a class="btn btn-success btn-medium" href="#">See more</a></p>  
		</div>  
		<div class="span4">  
			<h2 class="small">Developers</h2>  
				<p>All developers are invited to help us improve our website and minereader plugin, both are open sourced and we welcome all contributors</p>  
				<p><a class="btn btn-success btn-medium" href="devs.php">Visit the dev page</a></p>  
		</div> 
		</div>
    </div>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>