
<?php
$file = $_FILES['archivo']['tmp_name'];
$remote_file = "/public_html/imagen".$_FILES['archivo']['name'];
$ftp_server = "files.000webhost.com";
// establecer una conexión básica
$conn_id = ftp_connect($ftp_server);

// iniciar sesión con nombre de usuario y contraseña
$login_result = ftp_login($conn_id, "readandwatch", "Vergademono1");

// cargar un archivo
if (ftp_put($conn_id, $remote_file, $file, FTP_ASCII)) {
 echo "se ha cargado $file con éxito\n";
} else {
 echo "Hubo un problema durante la transferencia de $file\n";
}

// cerrar la conexión ftp
ftp_close($conn_id);
?>
