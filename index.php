<?php

require './jpgCutter.class.php';

//$files = array('1.pdf-stron.jpg');


$dir = opendir("./src");

while($file = readdir($dir)) {
    if ($file != '.' && $file != '..'){
	    $files[] = $file;
    }
}


closedir($dir);

//var_dump($files);

$cutter = new jpgCutter(120, 580, 190, 130, 100, $files, './src', './dst');
$cutter->cut();


?>