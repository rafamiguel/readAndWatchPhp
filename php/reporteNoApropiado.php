<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idVidDoc"])){

    $idVidDoc=$_GET["idVidDoc"];
    
    $sentencia="delete viddoc, reportesviddoc from viddoc  INNER JOIN reportesviddoc  on viddoc.idVidDoc = reportesviddoc.idVidDoc  where reportesviddoc.reportes >= 10 and reportesviddoc.tipo = 'No es apropiado al tema o materia' ";
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