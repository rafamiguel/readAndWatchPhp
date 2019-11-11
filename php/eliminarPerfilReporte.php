<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idPerfil"])){

    $idPerfil=$_GET["idPerfil"];
    
    $sentencia="delete usuario, reportesperfil from usuario INNER JOIN reportesperfil on usuario.idUsuario = reportesperfil.idPerfil where reportesperfil.reportes >= 3 and reportesperfil.tipo = 'Contenido sexual u obseno' ";
    //echo $sentencia;
    if(mysqli_query($conexion, $sentencia)){
    $json['usuario'][]=array("success" => 1,);

} else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;}
    
    //echo $sentencia;
    echo json_encode($json);
}
mysqli_close($conexion);
?>