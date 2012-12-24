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
          	<a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§l"); $("#writing").focus();' style = ""><i class = "icon-bold"></i></a> <a class = "btn" style = "" onclick = '$("#writing").val($("#writing").val() + "§o"); $("#writing").focus();'><i class = "icon-italic"></i></a>
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§n"); $("#writing").focus();' style = ""><i class = "icon-underline"></i></a> <a class = "btn" style = "" onclick = '$("#writing").val($("#writing").val() + "§m"); $("#writing").focus();'><i class = "icon-strikethrough"></i></a>
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§k"); $("#writing").focus();' style = ""><i class = "icon-magic"></i></a> <br style = "display: block; margin-bottom: 5px;" />
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§r"); $("#writing").focus();' style = ""><i class = "icon-undo"></i></a> <a class = "btn" style = "color: #000000;" onclick = '$("#writing").val($("#writing").val() + "§0"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§1"); $("#writing").focus();' style = "color: #0000AA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #00AA00;" onclick = '$("#writing").val($("#writing").val() + "§2"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§3"); $("#writing").focus();' style = "color: #00AAAA;"><i class = "icon-sign-blank"></i></a><br style = "display: block; margin-bottom: 5px;" /><a class = "btn" style = "color: #AA0000;" onclick = '$("#writing").val($("#writing").val() + "§4"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§5"); $("#writing").focus();' style = "color: #AA00AA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #FFAA00;" onclick = '$("#writing").val($("#writing").val() + "§6"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§7"); $("#writing").focus();' style = "color: #AAAAAA;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #555555;" onclick = '$("#writing").val($("#writing").val() + "§8"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> <br style = "display: block; margin-bottom: 5px;" />
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§9"); $("#writing").focus();' style = "color: #5555FF;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #55FF55;" onclick = '$("#writing").val($("#writing").val() + "§a"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§b"); $("#writing").focus();' style = "color: #55FFFF;"><i class = "icon-sign-blank"></i></a> <a class = "btn" style = "color: #FF5555;" onclick = '$("#writing").val($("#writing").val() + "§c"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a> 
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§d"); $("#writing").focus();' style = "color: #FF55FF;"><i class = "icon-sign-blank"></i></a><br style = "display: block; margin-bottom: 5px;" /><a class = "btn" style = "color: #FFFF55;" onclick = '$("#writing").val($("#writing").val() + "§e"); $("#writing").focus();'><i class = "icon-sign-blank"></i></a>
          	 <a class = "btn" onclick = '$("#writing").val($("#writing").val() + "§f"); $("#writing").focus();' style = "color: #FFFFFF;"><i class = "icon-sign-blank"></i></a>
          </div>
          
            <div class = "well" style = "position: absolute; right: 0; top: 220px; width: 220px;">
          	<input type = "text" placeholder = "Title" />
          	<br />
          	<input type = "text" placeholder = "Author" />
          	<br />
          	<select size='7'>
          		<optgroup label='Licensing'>
          			<option value = "reserved">All rights reserved</option>
          			<option value = "BY-NC-ND">CC-BY-NC-ND</option>
          			<option value = "BY-NC-SA">CC-BY-NC-SA</option>
          			<option value = "BY-NC">CC-BY-NC</option>
          			<option value = "BY-SA">CC-BY-SA</option>
          			<option vlaue = "BY">CC-BY</option>
          			<option vlaue = "pd">Public domain</option>
          			
          		</optgroup>
          	</select><br />
          	<a class = "btn btn-success">
          		<i class = "icon-plus"></i> Add book
          	</a>
          </div>
       <textarea class = "book" id = "writing" style = "width: 470px; height: 618px; border: 0; background-image: url('img/book.png');"></textarea>
       
          <br /> 
        </form>
      </div>
	</div><br />
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
</script>
