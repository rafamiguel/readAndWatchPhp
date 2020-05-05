<?php
//$conexion = mysqli_connect("localhost", "root", "", "basepw");
$conexion = mysqli_connect("remotemysql.com", "wLSt9BeKne", "CZBD7wHLto", "wLSt9BeKne");
if (mysqli_connect_errno()) {
    printf("No se pudo establecer la conexion %s\n", mysqli_connect_error());
    exit();
}
//$resultado=mysqli_select_db($conexion, "base");
$resultado=mysqli_select_db($conexion, "wLSt9BeKne");
mysqli_set_charset($conexion, "utf8");
?>
