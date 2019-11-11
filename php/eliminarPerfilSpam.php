<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idPerfil"])){

    $idPerfil=$_GET["idPerfil"];
    
    $sentencia="UPDATE usuario as a INNER JOIN reportesperfil as b on a.idUsuario = b.idPerfil set a.estado = 'S' where b.reportes >= 5 and b.tipo = 'Es spam' ";
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