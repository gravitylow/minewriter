<?php
$Author=$_POST["author"];
$Title =$_POST["title"];
$Content=$_POST["content"];
$file="/books/" . uniqid().".txt";
//This is where we format the entire book
//Sanatise the author and title variables
//This allows alphanumeric, underscores and some punctuation, stripping out new lines etc
$Title = preg_replace('/[^a-zA-Z0-9_ \\\.\(\)-\]/s', '', $Title);
$Author = preg_replace('/#[^a-z0-9_.-]#i/', '', str_replace(".", "", $author));
$book = "!Author-" . $Author . "\n" . "!Title-" . $Title . "\n" . $Content;
file_put_contents($file, $book);
?>
