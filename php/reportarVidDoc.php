<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $idUsuario=$_GET["idUsuario"];
    $consulta="SELECT * from personaReportaVidDoc where idUsuario={$idUsuario} 
    and idVidDoc={$idVidDoc}";
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $reportes=0;
        $consulta="SELECT reportes from reportesviddoc where idVidDoc={$idVidDoc} and tipo='{$tipo}'";
        if($resultado=$conexion->query($consulta)){
        $row = $resultado->fetch_array(MYSQLI_NUM);
        $reportes = $row[0];
        }
        $reportes+=1;
        if($reportes==1){
            if($tipo== 'Contenido sexual u obseno'){
            $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc,idCastigo) values({$reportes},'{$tipo}',{$idVidDoc}, 1)";
            }
            elseif($tipo== 'Es spam'){
            $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc,idCastigo) values({$reportes},'{$tipo}',{$idVidDoc}, 2)";
            }
            elseif($tipo== 'No es apropiado al tema o materia'){
            $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc,idCastigo) values({$reportes},'{$tipo}',{$idVidDoc}, 3)";
            }
            else($tipo== 'No se puede visualizar'){
            $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc,idCastigo) values({$reportes},'{$tipo}',{$idVidDoc}, 4)";
            }

            $resultado=mysqli_query($conexion, $sentencia);
        }else{
            $sentencia="update reportesviddoc  set reportes={$reportes} where idVidDoc={$idVidDoc}";
            $resultado=mysqli_query($conexion, $sentencia);
        }
        $sentencia="insert into personaReportaVidDoc(idVidDoc,idUsuario) values({$idVidDoc},{$idUsuario})";
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