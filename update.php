<?php
$ip = $_SERVER['REMOTE_ADDR'];
$auth = false;
//Only allow github to build
if ($ip == "207.97.227.253" || $ip == "50.57.128.197" || $ip == "108.171.174.178") {
$auth = true;
}
if (!$auth) {
file_put_contents("logs/gitlog.txt", "\n" . date("Y-m-d H:i:s") . ": Unauthorised deploy attempt from $ip", FILE_APPEND | LOCK_EX);
die("Not authorised.");
}
function recurse_copy($src,$dst) { 
    $dir = opendir($src); 
    @mkdir($dst); 
    while(false !== ( $file = readdir($dir)) ) { 
        if (( $file != '.' ) && ( $file != '..' )) { 
            if ( is_dir($src . '/' . $file) ) { 
                recurse_copy($src . '/' . $file,$dst . '/' . $file); 
            } 
            else { 
                copy($src . '/' . $file,$dst . '/' . $file); 
            } 
        } 
    } 
    closedir($dir); 
} 
function rmdir_recursive($dir) {
    foreach(scandir($dir) as $file) {
        if ('.' === $file || '..' === $file) continue;
        if (is_dir("$dir/$file")) rmdir_recursive("$dir/$file");
        else unlink("$dir/$file");
    }
    rmdir($dir);
}
$image = file_get_contents("https://github.com/milkywayz/minewriter/archive/master.zip");
file_put_contents("master.zip", $image);
$zip = new ZipArchive;
if ($zip->open('master.zip') === TRUE) {
    $zip->extractTo(getcwd());
    $zip->close();
    recurse_copy(getcwd() . "/minewriter-master/", getcwd());
    unlink("master.zip");
    rmdir_recursive(getcwd() . "/minewriter-master/");
    file_put_contents("logs/gitlog.txt", "\n" . date("Y-m-d H:i:s") . ": Successful deploy from $ip", FILE_APPEND | LOCK_EX);   
} else {
    file_put_contents("logs/gitlog.txt", "\n" . date("Y-m-d H:i:s") . ": FAILED deploy from $ip", FILE_APPEND | LOCK_EX);
}
?>

