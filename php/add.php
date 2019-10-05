<?php
$target_dir = "https://readandwatch.000webhostapp.com/?dir=imagen/";
$uploadOk = 1;

$file = basename($_FILES["fileToUpload"]["name"];
$dest = fopen("ftp://readandwatch:Vergademono1@files.000webhost.com/" . $file, "wb");
$src = file_get_contents($file);
fwrite($dest, $src, strlen($src));
fclose($dest); 

?>