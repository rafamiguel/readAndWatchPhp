<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idVidDoc"])){

    $idVidDoc=$_GET["idVidDoc"];
    
    $sentencia="UPDATE viddoc as a INNER JOIN reportesviddoc as b on a.idVidDoc=$idVidDoc = b.idVidDoc = $idVidDoc set a.eliminado = 'S' where b.reportes >= 3 and b.tipo = 'Contenido sexual u obseno' ";
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