<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = file_get_contents('php://input');
  $input = substr($input, 5);
  $input = urldecode($input);
  $jsonObj = json_decode($input, true);
  file_put_contents("logs/stats.txt", "\n" . date("Y-m-d H:i:s") . ": var_dump($jsonObj)", FILE_APPEND | LOCK_EX);
  }
?>
  