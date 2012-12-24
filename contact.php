<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact</title>
  <?php headIncludes(); ?>
  <script type = "text/javascript" src = "//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
  <script type = "text/javascript" src = "//cdnjs.cloudflare.com/ajax/libs/jquery.form/3.20/jquery.form.js"></script>
  <script type = "text/javascript">
  	$(document).ready(function() { 
    var options = { 
        target:        '#hidden'   // target element(s) to be updated with server response  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the form's submit event 
    $('#contact').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $("#hidden").html("load.gif");
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
	}); 
  </script>
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
					    <form class="form-horizontal" id="contact" action="mail.php" method="POST">
						    <div class="control-group">
							    <label class="control-label" for="inputName">Username</label>
							    <div class="controls">
							    	<input type="text" id="inputName" placeholder="Username" name = "name">
							    </div>
							</div>
							<div class="control-group">
							    <label class="control-label" for="inputEmail">Email</label>
							    <div class="controls">
							    	<input type="password" id="inputEmail" placeholder="Email" name = "email">
							    </div>
							</div>
							<div class="control-group">
							    <label class="control-label" for="inputMsg">Message</label>
							    <div class="controls">
							    	<textarea class="contactInputs" cols="100" style="height: 70px;" id="inputMsg" name="content"></textarea>
							    	
								</div>
						    </div>
						    <div class="control-group">
						    	<div class="controls">
						    		<button type="submit" class = "btn btn-success"><i class = "icon-envelope"></i> Send email</button>
						    	</div>
						    </div>
					    </form>
					    <div id = "hidden"></div>
				
      </div>
    </div>
    	<?php footer(); ?>

  </body>
</html>