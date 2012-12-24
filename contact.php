<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
  <?php headIncludes(); ?>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Contact <small>Have any questions?</small></h1>
        </div>
        	<h2 class="big">Contact</h2>     
					<ul>
						<li class="big">Do you need to contact the team?</li>
						<li class="big">Fill out the form below and push submit!</li>
					</ul>   
					<div id="contactTable">
               			<form id="contact" action="mail.php" method="POST">
               				<table id="contactTable">
               				<br />
               					<tr><td class="left">UserName:</td><td><input class="contactInputs" type="text" name="name"/></td></tr>
               					<tr><td class="left">Email:</td><td><input class="contactInputs" type="text" name="email"/></td></tr>
               					<tr><td class="left">Comments:</td><td><textarea class="contactInputs" cols="100" style="height: 70px;" id="contactText" name="content"></textarea></td></tr>
               				</table>
               				<a href = "#" id = "submitBtn" class = "btn btn-success"><i class = "icon-mail"></i> Send email</a>
               			</form>
               		</div>
      </div>
    </div>
    	<?php footer(); ?>

  </body>
</html>