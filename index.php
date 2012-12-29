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
		<p><a href="write.php" class="btn btn-success btn-medium">Try now</a></p>  
		</div>  
				
		<div class="row">  		
			<div class="span4">  
				<h2>How to use</h2>  
					<p>Using MineWriter is simple, you write your story in our authoring client and then once it's submitted, you can download it in game!</p>  
					<p><a class="btn btn-success btn-medium" href="#">Get the plugin</a></p>  
			</div>  
			<div class="span4">  
				<h2>About the project</h2>  
					<p>MineWriter and MineReader will always be free to use, and we will do our best to provide a ad-free environment</p>
					<p><a class="btn btn-success btn-medium" href="about.php">About</a></p>  
			</div>  
			<div class="span4">  
				<h2>Try yourself</h2>  
					<p>We will be setting up a demo server running the MineReader plugin, currently the demo re-directs you to my server.</p>  					
					<a href="#" class="btn btn-primary" title="Use this IP address to connect to the demo server:', 'demo.minewriter.net'); return false;">Demo!</a>  
			</div>		 
		</div>
		
		<?php divider(); ?>
		
        <div class="row"> 
        	<div class="span4">  
				<h2>Server Owners</h2>  
					<p>We want to make it as easy as possible for your players to author books and get them onto your server. Using the Bukkit plugin called MineReader, your players can easily get any book they want in game, with ease of use!</p>  
					<p><a class="btn btn-success btn-medium" href="#">Get the plugin</a></p>  
			</div>  
			<div class="span4">  
				<h2>Regular Players</h2>  
					<p>Writing books and bringing them onto your favorite server is now easier then ever!</p>  
					<p><a class="btn btn-success btn-medium" href="#">See more</a></p>  
			</div>  
			<div class="span4">  
				<h2>Developers</h2>  
					<p>All developers are invited to help us improve our website and minereader plugin, both are open sourced and we welcome all contributors</p>  
					<p><a class="btn btn-success btn-medium" href="devs.php">Visit the dev page</a></p>  
			</div>	
        </div> 	
        <?php divider(); ?>
        
    </div>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>