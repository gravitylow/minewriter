<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = file_get_contents('php://input');
  $jsonObj = json_decode($input, true);
  file_put_contents("logs/stats.txt", "\n" . date("Y-m-d H:i:s") . ": Updated stats to: $jsonObj", FILE_APPEND | LOCK_EX);
  }
?>
  