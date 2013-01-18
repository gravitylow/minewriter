<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = file_get_contents('php://input');
  $input = substr($input, 5);
  $input = urldecode($input);
  $jsonObj = json_decode($input, true);
  foreach ($jsonObj as $name => $value) {
  	file_put_contents("logs/stats.txt", "\n" . $name . ": $value", FILE_APPEND | LOCK_EX);
  }  
  }
?>
  