<?PHP
include 'conexion.php';
$json=array();
 if(isset($_GET["txtCorreo"]) && isset($_GET["txtContrasena"])){
  $txtCorreo=$_GET['txtCorreo'];
  $txtContrasena=$_GET['txtContrasena'];
  
 

/*Comprobar si existe el usuario o no*/
 $consulta = "select idUsuario, tipo from usuario where correo= '{$txtCorreo}' and contrasena= '{$txtContrasena}' ;";
 $resultado=mysqli_query($conexion, $consulta);
 $registro=mysqli_fetch_array($resultado);
 if(is_null($registro)){
  $json['usuario'][]=array("idUsuario" => -1,);
  echo json_encode($json);
}else{
  $json['usuario'][]=$registro;
  echo json_encode($json);
}

}else{
   $resulta["txtCorreo"]="Campos no ingresados";
   $resulta["txtContrasena"]="Campos no ingresados";
  $json['usuario'][]=$resulta;
  echo json_encode($json);
 }
mysqli_close($conexion);
?>