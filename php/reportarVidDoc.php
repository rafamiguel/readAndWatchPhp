<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $idUsuario=$_GET["idUsuario"];
    $consulta="SELECT * from personaReportaVidDoc where idUsuario={$idUsuario}";
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $consulta="SELECT *from personaReportaVidDoc where idVidDoc={$idVidDoc}";
        $reportes=mysqli_num_rows($conexion->query($consulta));
        $reportes++;
        $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc) values({$reportes},'{$tipo}',{$idVidDoc})";
        $resultado=mysqli_query($conexion, $sentencia);
        $sentencia="insert into personaReportaVidDoc(idVidDoc,idUsuario) values({$idVidDoc},{$idUsuario})";
        $resultado=mysqli_query($conexion, $sentencia);
        $json['usuario'][]=array("repetido" => 0,);
        $json['usuario'][]=array("success" => 1,);
        echo json_encode($json);
    }else{
        $json['usuario'][]=array("repetido" => 1,);
        $json['usuario'][]=array("success" => 1,);
        echo json_encode($json);

    }

}else{
    $json['usuario'][]=array("repetido" => 0,);
    $json['usuario'][]=array("success" => 0,);
    echo json_encode($json);
}
mysqli_close($conexion);
?>