<?php
$obj = json_decode($_POST['value']);
logToFile("post.txt",$obj);

function logToFile($filename,$msg) {
      $fd=fopen($filename,"a");
      fwrite($fd,$msg);
      fclose($fd);
}
?>