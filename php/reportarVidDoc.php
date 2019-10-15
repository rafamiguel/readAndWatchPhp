<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $idUsuario=$_GET["idUsuario"];
    $consulta="SELECT count(*) from personaReportaVidDoc where idUsuario={$idUsuario}";
    echo $consulta;
    $result = $conexion->query($consulta);
    $row = $result->fetch_row();
    echo $row[0];
   

}else{
        $resulta["repetido"]=0;
        $json['usuario'][]=$resulta;
        $resulta["success"]=0;
        $json['usuario'][]+=$resulta;
      echo json_encode($json);
}
mysqli_close($conexion);
?>