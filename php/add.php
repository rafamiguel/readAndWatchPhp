<?php
	$ftp_server="files.000webhost.com";
	$ftp_usuario="readandwatch";
	$ftp_password="Vergademono1";
	$conexion=ftp_connect($ftp_server);
	$resultado=ftp_login($conexion, $ftp_usuario, $ftp_password);
	if(!$resultado || !$conexion){
		echo 'No se pudo conectar';
		exit;
	}else{
		echo 'Conectado correctamente';
	}
?>	