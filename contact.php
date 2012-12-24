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
               			<form id="contact">
               				<table id="contactTable">
               				<br />
               					<tr><td class="left">UserName:</td><td><input class="contactInputs" type="text" name="name"/></td></tr>
               					<tr><td class="left">Email:</td><td><input class="contactInputs" type="text" name="email"/></td></tr>
               					<tr><td class="left">Comments:</td><td><textarea class="contactInputs" cols="100" style="height: 70px;" id="contactText"></textarea></td></tr>
               				</table>
               				<input type="submit" style="margin-left:180px;"/>
               			</form>
               		</div>
        <script type="text/javascript" src="js/jquery-1.6.2.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.8.16.custom.min.js"></script>        
        <script type="text/javascript" src="js/demo.js"></script>

  </body>
</html>
