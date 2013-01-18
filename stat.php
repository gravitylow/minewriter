<?php
$js = json_decode(file_get_contents('php://input'));
file_put_contents("logs/post.txt", "\n" . $js . "\n", FILE_APPEND | LOCK_EX);
?>