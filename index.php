<?php
require("functions.php"); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>MineWriter</title>
	<?php headIncludes(); ?>
	<style>
	.image { 
		position: relative; 
		width: 100%;
	}
	.image h1 { 
		position: absolute; 
		top: 100px; 
		left: 0px; 
		width: 100%; 
		font-size: 50px;
	}
	.image p { 
		position: absolute; 
		top: 180px; 
		left: 0px; 
		width: 100%; 
	}
	.image span { 
		color: white; 
		letter-spacing: -1px;  
		background: rgb(0, 0, 0);
		background: rgba(0, 0, 0, 0.7);
		padding: 10px; 
	}
	</style>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">   
    <div class="content"><!---
		<h1>MineWriter <small>A user friendly authoring service!</small></h1>
		<?php divider(); ?>
		-->
		<div class="image">
			<img src="img/banner.png">
			<h1><span>MineWriter</span></h1>
			<p><span>A user friendly authoring service!</span></p>
		</div>
		<br>
		<div class="row">
			<div class="span4">
				<h4><img src="http://mag.racked.eu/resource/icons/340.1.png"> Write awesome books!</h4>
				<p>Write books on our platform and get them on your favorite server! No need to write all your ideas and memories again and again.</p>
				<a href="write.php" class="btn btn-primary">Start writing</a>
			</div>
			<div class="span4">
				<h4><img src="http://mag.racked.eu/resource/icons/340.2.png"> Get them on your server!</h4>
				<p>Simply install the MineReader plugin and receive any book you want ingame! That's as easy as it could be.</p>
				<a href="tutorial.php" class="btn btn-primary">Start reading</a>
			</div>
			<div class="span4">
				<h4><img src="http://mag.racked.eu/resource/icons/47.1.png"> Access our great libary!</h4>
				<p>Access our big libary of books! We provide you access to a very easy API. Access all the books on your website or app.</p>
				<a href="devs.php" class="btn btn-primary">Start browsing</a>
			</div>
		</div>
		<br><br>
		<h4>More about the MineWriter and MineReader project:</h4>
		<p>MineWriter was started in December of 2012. Our aim is to provide a fun way for creative writers to bring their work on any server! Both <a href="https://github.com/milkywayz/minewriter">MineWriter</a> and <a href="https://github.com/milkywayz/minereader">MineReader</a> are open-source and welcome contributions!</p>
		<a href="about.php" class="btn btn-primary">Learn more about us</a> <a href="team.php" class="btn btn-primary">Meet the team</a>
    </div>
    </div>
       <?php footer(); ?>    
    </div>
  </body>
</html>
