<?php
    $imagen=base64_decode($_REQUEST['imagecode']);
    $nombre=$_REQUEST['imagename'].".jpeg";
    $path="../perfil/".$nombre;
    file_put_contents($path,$imagen);
?>