<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idPregunta"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idPregunta=$_GET["idPregunta"];
    $idUsuario=$_GET["idUsuario"];
    $tipo=$_GET["tipo"];
    $consulta="SELECT * from personaReportaPreg where idUsuario={$idUsuario} 
    and idPregunta={$idPregunta}";
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $reportes=0;
        $consulta="SELECT reportes from reportespreg where idPregunta={$idPregunta} and tipo='{$tipo}'";
        if($resultado=$conexion->query($consulta)){
        $row = $resultado->fetch_array(MYSQLI_NUM);
        $reportes = $row[0];
        }
        $reportes+=1;
        if($reportes==1){
            $sentencia="insert into reportespreg(reportes,tipo,idPregunta) values({$reportes},'{$tipo}',{$idPregunta})";
            $resultado=mysqli_query($conexion, $sentencia);
        }else{
            $sentencia="update reportespreg set reportes={$reportes} where idPregunta={$idPregunta}";
            $resultado=mysqli_query($conexion, $sentencia);
        }
        $sentencia="insert into personaReportaPreg(idPregunta,idUsuario) values({$idPregunta},{$idUsuario})";
        $resultado=mysqli_query($conexion, $sentencia);
        $json['usuario'][]=array("repetido" => FALSE,);
        $json['usuario'][]=array("success" => TRUE,);
        echo json_encode($json);
    }else{
        $json['usuario'][]=array("repetido" => TRUE,);
        $json['usuario'][]=array("success" => TRUE,);
        echo json_encode($json);

    }

}else{
    $json['usuario'][]=array("repetido" => FALSE,);
    $json['usuario'][]=array("success" => FALSE,);
    echo json_encode($json);
}
mysqli_close($conexion);
?>