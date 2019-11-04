<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idPerfil"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idPerfil=$_GET["idPerfil"];
    $idUsuario=$_GET["idUsuario"];
    $tipo=$_GET["tipo"];
    $consulta="SELECT * from personaReportaPerfil where idUsuario={$idUsuario} 
    and idPerfil={$idPerfil}";
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $reportes=0;
        $consulta="SELECT reportes from reportesperfil where idPerfil={$idPerfil} and tipo='{$tipo}'";
        if($resultado=$conexion->query($consulta)){
        $row = $resultado->fetch_array(MYSQLI_NUM);
        $reportes = $row[0];
        }
        $reportes+=1;
        if($reportes==1){
            $sentencia="insert into reportesperfil(reportes,tipo,idPerfil) values({$reportes},'{$tipo}',{$idPerfil})";
            $resultado=mysqli_query($conexion, $sentencia);
        }else{
            $sentencia="update reportesperfil set reportes={$reportes} where idPerfil={$idPerfil}";
            $resultado=mysqli_query($conexion, $sentencia);
        }
        $sentencia="insert into personaReportaPerfil(idPerfil,idUsuario) values({$idPerfil},{$idUsuario})";
        $resultado=mysqli_query($conexion, $sentencia);
        $json['usuario'][]=array("repetido" => FALSE,);
        $json['usuario'][]=array("success" => TRUE,);
        //echo json_encode($json);
    }else{
        $json['usuario'][]=array("repetido" => TRUE,);
        $json['usuario'][]=array("success" => TRUE,);
        //echo json_encode($json);

    }

}else{
    $json['usuario'][]=array("repetido" => FALSE,);
    $json['usuario'][]=array("success" => FALSE,);
    //echo json_encode($json);
}
mysqli_close($conexion);
?>