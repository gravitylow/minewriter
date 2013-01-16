<?php
include 'Mobile_Detect.php';
$detect = new Mobile_Detect();
if($detect->isiOS()){
    echo("iOS has been detected<br>");
    if($detect->isIpad()) {
        echo("It's an iPad, running version: " . $detect->version('iPad'));
    }

  if($detect->isIphone()) {
    echo("It's an iPhone, running version: " . $detect->version('iPhone'));
  }
} else {
    die("No iOS detected.");
}
