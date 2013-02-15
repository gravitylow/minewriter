<?php require("functions.php");
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();
?>
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
        	  <?php topHeader("Formatting tools"); ?>
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
          
            <div class = "well" style = "position: absolute; right: 0; top: 260px; width: 220px;">
            <?php topHeader("Book details"); ?>
          	<input type = "text" placeholder = "Title" name = "title" required /><br />
          	<input type = "text" placeholder = "Author" name = "author" required /><br />
          	<select size='8' name = "license" required>
          		<?php if($detect->isiOS()) {?><option disabled="disabled">Licensing</option><?php } else { ?><optgroup label='Licensing'><?php } ?>
          			<option vlue = "reserved">All rights reserved</option>
          			<option vlue = "BY-NC-ND">CC-BY-NC-ND</option>
          			<option vlue = "BY-NC-SA">CC-BY-NC-SA</option>
          			<option vlue = "BY-NC">CC-BY-NC</option>
          			<option vlue = "BY-SA">CC-BY-SA</option>
          			<option vlaue = "BY">CC-BY</option>
          			<option vlaue = "pd">Public domain</option>
          		<?php if(!$detect->isiOS()) { ?></optgroup><?php } ?>
          	</select><br />
          	<select size='1' name = "genre" id = "genre" required>
          		<?php if($detect->isiOS()) {?><option disabled="disabled">Genre</option><?php } else { ?><optgroup label='Genre'><?php } ?>
					<option>Action and Adventure</option>
					<option>Chick Lit</option>
					<option>Children’s</option>
					<option>Contemporary</option>
					<option>Crime</option>
					<option>Family Saga</option>
					<option>Fantasy</option>
					<option>Dark Fantasy</option>
					<option>General Fiction</option>
					<option>Historical Fiction</option>
					<option>Horror</option>
					<option>Humour</option>
					<option>Literary Fiction</option>
					<option>Lyrics</option>
					<option>Military and Espionage</option>
					<option>Multicultural</option>
					<option>Mystery</option>
					<option>Non-fiction</option>
					<option>Religious and Inspirational</option>
					<option>Romance</option>
					<option>Science Fiction</option>
					<option>Short Story Collections</option>
					<option>Thrillers and Suspense</option>
					<option>Western</option>
					<option>Young Adult</option>
					<option>Other</option>
          		<?php if(!$detect->isiOS()) { ?></optgroup><?php } ?>
          	</select><br />
          	<input type = "checkbox" name = "not_nsfw" id="not_nsfw" checked = "checked"/> Suitable for all users <br /><br />
          	<button type = "submit" class = "btn btn-success">
          		<i class = "icon-plus"></i> Add book
          	</button>
          </div>
          <div class = "well" style = "position: absolute; right: 0; top: 696px; width: 220px;">
          <?php topHeader("Submission information"); ?>
          	<a href="#myModal" role="button" class="btn btn-primary" data-toggle="modal" style = "margin-left: 16px;"><i class = "icon-info-sign"></i> Submission Guidelines</a>
          	</div>
       <textarea class = "book" id = "writing" name = "bookContent" style = "" required></textarea>
       <p class = "text-warning" style = "width: 680px; padding-top: 10px;">All books must be original. No copyrighted material will be accepted. Additionally, 'adult' content must be marked as so by unticking the checkbox on the right. Failure to comply with this and the polciies shown in the submission info may result in book deletion and the ban of the user responsible.</p>
           
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
		<p><strong>Restricted content</strong></p>
		<p>Absolutely no illegal material is to be uploaded (posting is a form of uploading) to this site. Linking to pages that provide illegal material is strictly prohibited as well. Illegal materials include, but are not limited to, pornography, psychoactive drugs, bootleg software, and any software designed to circumvent or bypass legal restrictions. Anything disallowed by law in the United Kingdom or the laws which govern the server upon which this site is hosted is strictly disallowed.</p>
		<p>Adult content must be marked clearly with the content rating system - untick the suitable for all users checkbox</p>
		<p><strong>Licensing information</strong></p>
		<p>We offer a variety of licenses to ensure your work is as protected or as free as you wish. A quick summary is available below (this is not legal advice):</p>
		<ul style = "list-style: none">
			<li>All rights reserved - This very simply means you retain all right such as commercial use. Other than fair use, your works cannot be modified/distributed.</li>
			<li>CC-BY-NC-ND - Creative commons license. Allows sharing but not commerical use or modification. Works must be attributed to the copyright holder in the way they state.</li>
			<li>CC-BY-NC-SA - Creative commons license. Allows sharing and distribution as long as modifications are shared under the same or similar license. Non-commercial only, works must be attributed to the copyright holder in the way they state.</li>
			<li>CC-BY-NC - Creative commons license. Allows sharing and modifications without requiring modifications to be released. Non-commercial only, works must be attributed to the copyright holder in the way they state.</li>
			<li>CC-BY-SA - Creative commons license. Allows commercial use and mofication as long as modifications are released under a same or similar license. Works must be attributed to the copyright holder in the way they state.</li>
			<li>CC-BY - Creative commons license. Allows commercial use and mofication without any requirements other than attribution.</li>
			<li>Public domain - Gives up all your rights and allows modification, distribution and commercial usage without consent.</li>
		</ul>
		<p>Where attribtuion is not specified a link back and credit to the author's name is usually suffice. All copyright holders (the publishing user who wrote the story) can waive any of these restrictions (such as attribution by adding a note to the book).</p>
		</div>
</div>
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
$("#genre").change(function () {
	var value = $("select option:selected").text();
	if(value == "Horror" || value == "Crime" || value == "Military and Espionage") {
		alert("You chose a category, which might not be suitable for all users. \nCheck if your book is really suitable for everbody and enable the checkbox if so.");
		$("#not_nsfw").attr('checked', false);
	}
})
</script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>
	<?php footerWithoutJQ(); ?>
  </body>
</html>
