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
		<p><a href="write.php" class="btn btn-primary">Try now</a></p>  
		</div>  
				
		<div class="row">
		  <div class="span9">
		    <h2>About the project</h2>
		    <div class="row">
		      <div class="span6">
		      	<ul> 
		      		<p>Test</p>
		      	</ul>
		      </div>
		      <div class="span3">
		      	<ul>
		      		<p></p>
		      	</ul>
		      </div>
		    </div>
		  </div>
		</div>
		
		<?php divider(); ?>
		
        <div class="row"> 
        	<div class="span4">  
				<h2>Server Owners</h2>  
					<p>We want to make it as easy as possible for your players to author books and get them onto your server. Using the Bukkit plugin called MineReader, your players can easily get any book they want in game, with ease of use!</p>  
					<p><a class="btn btn-primary" href="#">Get the plugin</a></p>  
			</div>  
			<div class="span4">  
				<h2>Regular Players</h2>  
					<p>Writing books and bringing them onto your favorite server is now easier then ever! If the server you play on doesn't have MineReader, suggest it to them! :D</p>  
					<p><a class="btn btn-primary" href="#">See more</a></p>  
			</div>  
			<div class="span4">  
				<h2>Developers</h2>  
					<p>All developers are invited to help us improve our website and minereader plugin, both are open sourced and we welcome all contributors</p>  
					<p><a class="btn btn-primary" href="devs.php">Visit the dev page</a></p>  
			</div>	
        </div> 	
        <?php divider(); ?>
        
    </div>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>