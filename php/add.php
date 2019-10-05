<?php
$ftp_server="files.000webhost.com";
$ftp_usuario="readandwatch";
$ftp_pass="Vergademono1";
$con_id=ftp_connect($ftp_server);
$lr=ftp_login($con_id, $ftp_usuario, $ftp_pass);
if ((!$con_id) || (!$lr) ) {
    echo 'No se pudo conectar.';
    exit;
} else {
    echo 'Conectado correctamente.';
    $temp=explode(".", $_FILES['archivo']['name']);
    $source_file=$_FILES['archivo']['tmp_name'];
    $destino="archivos";
    $nombre=$_FILES["archivo"]['name'];
    //ftp_pass($con_id, true);
    $subio=ftp_put($con_id, $destino.'/'.$nombre, $source_file, FTP_BINARY);
    if ($subio) {
        echo "Se subió el archivo correctamente."
    } else {
        echo "Ocurrió un error.";
    }
}
?>