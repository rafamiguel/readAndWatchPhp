<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idVidDoc"])){

    $idVidDoc=$_GET["idVidDoc"];
    
    $sentencia="UPDATE viddoc as a INNER JOIN reportesviddoc as b on a.idVidDoc = b.idVidDoc set a.eliminado = 'S' where b.reportes >= 10 and b.tipo = 'No es apropiado al tema o materia' ";
    // echo $sentencia;
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