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