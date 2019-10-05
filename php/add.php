<?php

$ch = curl_init();
$localfile = $_FILES['fichero_usuario']['tmp_name'];
$remotefile = $_FILES['fichero_usuario']['name'];
$fp = fopen($localfile, 'r');
curl_setopt($ch, CURLOPT_URL, 'ftp://readandwatch:Vergademono1@files.000webhost.com/public_html/imagen'.$remotefile);
curl_setopt($ch, CURLOPT_UPLOAD, 1);
curl_setopt($ch, CURLOPT_INFILE, $fp);
curl_setopt($ch, CURLOPT_INFILESIZE, filesize($localfile));
curl_exec ($ch);
$error_no = curl_errno($ch);
curl_close ($ch);
if ($error_no == 0) {
    $error = 'File uploaded succesfully.';
} else {
    $error = 'File upload error.';
}

?>
