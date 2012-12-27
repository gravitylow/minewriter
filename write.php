<?php require("functions.php"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Write</title>
	<?php headIncludes(); ?>
	<script type = "text/javascript" src = "http://code.jquery.com/jquery.min.js"></script>
  </head>
  <body>
    <?php navigation(); ?>
    <div id = "wrap">
    <div class="container">

      <div class="content">
        <div class="page-header">
          <h1>Write <small>Submit your book here!</small></h1>
        </div> 
        <form name="myform" action="post.php" method="POST" style = "position: relative;">
        	  <div class = "well" style = "position: absolute; right: 0; width: 220px;">
          	<a class = "btn" onclick = '$("#writing").insertAtCaret("§l"); $("#writing").focus();' style = ""><i class = "icon-bold"></i></a> <a class = "btn" style = "" onclick = '$("#writing").insertAtCaret("§o"); $("#writing").focus();'><i class = "icon-italic"></i></a>
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§n"); $("#writing").focus();' style = ""><i class = "icon-underline"></i></a> <a class = "btn" style = "" onclick = '$("#writing").insertAtCaret("§m"); $("#writing").focus();'><i class = "icon-strikethrough"></i></a>
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§k"); $("#writing").focus();' style = ""><i class = "icon-magic"></i></a> <br style = "display: block; margin-bottom: 5px;" />
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§r"); $("#writing").focus();' style = ""><i class = "icon-undo"></i></a> <a class = "btn" style = "color: #000000;" onclick = '$("#writing").insertAtCaret("§0"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§1"); $("#writing").focus();' style = "color: #0000AA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #00AA00;" onclick = '$("#writing").insertAtCaret("§2"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§3"); $("#writing").focus();' style = "color: #00AAAA;"><i class = "icon-sign-blank"></i></a><br style = "display: block; margin-bottom: 5px;" /><a class = "btn" style = "color: #AA0000;" onclick = '$("#writing").insertAtCaret("§4"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§5"); $("#writing").focus();' style = "color: #AA00AA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #FFAA00;" onclick = '$("#writing").insertAtCaret("§6"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§7"); $("#writing").focus();' style = "color: #AAAAAA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #555555;" onclick = '$("#writing").insertAtCaret("§8"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> <br style = "display: block; margin-bottom: 5px;" />
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§9"); $("#writing").focus();' style = "color: #5555FF;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #55FF55;" onclick = '$("#writing").insertAtCaret("§a"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§b"); $("#writing").focus();' style = "color: #55FFFF;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #FF5555;" onclick = '$("#writing").insertAtCaret("§c"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§d"); $("#writing").focus();' style = "color: #FF55FF;"><i class = "icon-sign-blank"></i></a><br style = "display: block; margin-bottom: 5px;" /><a class = "btn" style = "color: #FFFF55;" onclick = '$("#writing").insertAtCaret("§e"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a>
          	 <a class = "btn" onclick = '$("#writing").insertAtCaret("§f"); $("#writing").focus();' style = "color: #FFFFFF;"><i class = "icon-sign-blank"></i></a>
          </div>
          
            <div class = "well" style = "position: absolute; right: 0; top: 220px; width: 220px;">
          	<input type = "text" placeholder = "Title" name = "title" required />
          	<br />
          	<input type = "text" placeholder = "Author" name = "author" required />
          	<br />
          	<select size='8' name = "license" required>
          		<optgroup label='Licensing'>
          			<option vlue = "reserved">All rights reserved</option>
          			<option vlue = "BY-NC-ND">CC-BY-NC-ND</option>
          			<option vlue = "BY-NC-SA">CC-BY-NC-SA</option>
          			<option vlue = "BY-NC">CC-BY-NC</option>
          			<option vlue = "BY-SA">CC-BY-SA</option>
          			<option vlaue = "BY">CC-BY</option>
          			<option vlaue = "pd">Public domain</option>
          			
          		</optgroup>
          	</select><br />
          	<button type = "submit" class = "btn btn-success">
          		<i class = "icon-plus"></i> Add book
          	</a>
          </div>
          
          <div class = "well" style = "position: absolute; right: 0; top: 535px; width: 220px;">
          	<a href = "#" role="button" data-toggle="modal" class = "btn btn-primary centred" style = "width: 110px; margin-left: 37px;">Submission Info</a>
          	</div>
       <textarea class = "book" id = "writing" name = "bookContent" style = "" required></textarea>
       
          <br /> 
        </form>
      </div>
	</div><br />
	<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
<h3 id="myModalLabel">Submission information</h3>
</div>
<div class="modal-body">
<p>To ensure all submissions are accessible, we require some information from you before we are able to add your entry to the database. Firstly, we ask for a title and author. These are displayed in-game, so make sure you consider them carefully. We also ask for a license which plays an important part in what other people are allowed to do with your book. </p>
</div>

</div>
	<?php footer(); ?>
  </body>
</html>
<script>
function getCaret(node) {
  if (node.selectionStart) {
    return node.selectionStart;
  } else if (!document.selection) {
    return 0;
  }

  var c = "\001",
      sel = document.selection.createRange(),
      dul = sel.duplicate(),
      len = 0;

  dul.moveToElementText(node);
  sel.text = c;
  len = dul.text.indexOf(c);
  sel.moveStart('character',-1);
  sel.text = "";
  return len;
}
$("#writing").keydown(function(e){


});

jQuery.fn.extend({
insertAtCaret: function(myValue){
  return this.each(function(i) {
    if (document.selection) {
      //For browsers like Internet Explorer
      this.focus();
      sel = document.selection.createRange();
      sel.text = myValue;
      this.focus();
    }
    else if (this.selectionStart || this.selectionStart == '0') {
      //For browsers like Firefox and Webkit based
      var startPos = this.selectionStart;
      var endPos = this.selectionEnd;
      var scrollTop = this.scrollTop;
      this.value = this.value.substring(0, startPos)+myValue+this.value.substring(endPos,this.value.length);
      this.focus();
      this.selectionStart = startPos + myValue.length;
      this.selectionEnd = startPos + myValue.length;
      this.scrollTop = scrollTop;
    } else {
      this.value += myValue;
      this.focus();
    }
  })
}
});
</script>
