<?PHP
include 'conexion.php';
$json=array();

    if(isset($_GET["idVidDoc"])){

    $idVidDoc=$_GET["idVidDoc"];
    
    $sentencia="UPDATE viddoc as a INNER JOIN reportesviddoc as b on a.idVidDoc = b.idVidDoc set a.eliminado = 'S' where b.reportes >= 5 and b.tipo = 'Es spam' ";
    // echo $sentencia;
    while(mysqli_query($conexion, $sentencia)){
    $json['usuario'][]=array("success" => 1,);

}
    
    //echo $sentencia;
    echo json_encode($json);
}
mysqli_close($conexion);
?>