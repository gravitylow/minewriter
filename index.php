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
		<div class="leaderboard" style = "position: relative">  
		<h1>MineWriter</h1>  
		<p>Try out our user friendly authoring service!</p>  
		<p><a href="write.php" class="btn btn-primary">Try now!</a></p> 
		<a class="thumbnail" href="#" style = "position: absolute; right: 25px; top: 30px;">
                  <img alt="260x180" data-src="holder.js/260x180" style="width: 260px; height: 180px;" src="data:image/png;base64,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">
                </a>
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
					<p><a class="btn btn-primary" href="http://dev.bukkit.org/server-mods/minereader/">Get the plugin</a></p>  
			</div>  
			<div class="span4">  
				<h2>Regular Players</h2>  
					<p>Writing books and bringing them onto your favorite server is now easier then ever! If the server you play on doesn't have MineReader, suggest it to them! :D</p>  
					<br /><p><a class="btn btn-primary" href="#">See more</a></p>  
			</div>  
			<div class="span4">  
				<h2>Developers</h2>  
					<p>All developers are invited to help us improve our website and minereader plugin, both are open sourced and we welcome all contributors</p>  
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
