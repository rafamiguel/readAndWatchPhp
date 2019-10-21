<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idComentario"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idComentario=$_GET["idComentario"];
    $idUsuario=$_GET["idUsuario"];
    $tipo=$_GET["tipo"];
    $consulta="SELECT * from personaReportaCom where idUsuario={$idUsuario} 
    and idComentario={$idComentario}";
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $reportes=0;
        $consulta="SELECT reportes from reportescom where idComentario={$idComentario} and tipo='{$tipo}'";
        if($resultado=$conexion->query($consulta)){
        $row = $resultado->fetch_array(MYSQLI_NUM);
        $reportes = $row[0];
        }
        $reportes+=1;
        if($reportes==1){
            $sentencia="insert into reportescom(reportes,tipo,idComentario) values({$reportes},'{$tipo}',{$idComentario})";
            $resultado=mysqli_query($conexion, $sentencia);
        }else{
            $sentencia="update reportescom set reportes={$reportes} where idComentario={$idComentario}";
            $resultado=mysqli_query($conexion, $sentencia);
        }
        $sentencia="insert into personaReportaCom(idComentario,idUsuario) values({$idComentario},{$idUsuario})";
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