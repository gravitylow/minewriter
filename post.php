
<?php
$Author=$_POST["author"];
$Title =$_POST["title"];
$Content=$_POST["content"];
$file="/books/" . rand().".txt";
//This is where we format the entire book
$book = "!Author-" . $Author . "\n" . "!Title-" . $Title . "\n" . $Content;
file_put_contents($file, $book);
?>