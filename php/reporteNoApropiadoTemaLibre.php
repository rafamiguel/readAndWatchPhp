<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idPregunta"])){

    $idPregunta=$_GET["idPregunta"];
    
    $sentencia="UPDATE pregunta as a INNER JOIN reportespreg as b on a.idPregunta = b.idPregunta set a.eliminado = 'S' where b.reportes >= 10 and b.tipo = 'No es apropiado al tema o materia' ";
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