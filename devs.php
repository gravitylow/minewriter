<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Develop for MineWriter</title>
	<?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>MineAPI <small>Write programs using our MineService!</small></h1>
        </div>            
              <div>
              	<h2 class="big">What is MineService?</h2>     
					<ul>
						<li class="big">MineService serves you a book from our DB from your query</li>
					</ul>   
				<h2 class="big">What Markups are supported?</h2>     
					<ul>
						<li class="big">JSON - Requires special care for parsing, but is recommended!</li>
						<li class="big">YAML- Requires special care for parsing</li>            
						<li class="big">Text - Regular text file, read it line for line</li>
						<li class="big">This list is not complete.</li>
					</ul>     
				<h2 class="big">How to use?</h2>     
					<ul>
						<li class="big">You open a connection to http://minewriter.net/query.php</li>          
						<li class="big">Currently the three variables are author, title, and type.</li>
						<li class="big">Example Query: http://minewriter.net/query.php?author=milkywayz&title=Wolfz&type=JSON</li>
						<li class="big">You can also query based on id. It will need the id, and the type.</li>
						<li class="big">Example Query: http://minewriter.net/query.php?id=5&type=YAML</li>
					</ul>              
               </div>
               <h2 class="big">Links</h2>     
					<ul style = "list-style: none;">
						<li class="big spaced devButton"><a class="btn btn-success" href="http://goo.gl/sRR9u">MineWriter Github</a></li>         
						<li class="big spaced devButton"><a class="btn btn-success" href="http://goo.gl/cgj2T">MineReader Github</a></li> 
						<li class="big spaced devButton"><a class="btn btn-success" href="https://apigee.com/MineWriter/embed/console/MineService">Apigee Console</a></li> 
					</ul>              
               </div>
            </div>
      </div>
      	<?php footer(); ?>

  </body>
</html>
