<?php
    $imagen=base64_decode($_REQUEST['imagename']);
    $nombre=$_REQUEST['imagecode'].".jpeg";
    $path="../imagenes/".$nombre;
    file_put_contents($path,$imagen);
?>