<?php

session_start();

$_SESSION["captcha"] = rand(1000,9999);
$img = imagecreatetruecolor(70,30);
$fill_color =imagecolorallocate($img,24,52,37);
$imagefilledrectangle($img,0,0,70,30,$fill_color);


?>