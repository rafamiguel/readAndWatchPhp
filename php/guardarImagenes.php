<?php
    $imagen=base64_decode($_REQUEST['imagecode']);
    $nombre=$_REQUEST['imagename'].".jpeg";
    $path="../imagenes/".$nombre;
    file_put_contents($path,$imagen);
?>