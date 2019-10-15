<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $idUsuario=$_GET["idUsuario"];
    $consulta="SELECT * from personaReportaVidDoc where idUsuario={$idUsuario}";
    echo $consulta;
    $repetido= mysqli_num_rows($conexion->query($consulta));
    if($repetido==0){
        $consulta="SELECT *from personaReportaVidDoc where idVidDoc={$idVidDoc}";
        echo $consulta;
        $reportes=mysqli_num_rows($conexion->query($consulta))
        $reportes++;
        $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc) values({$reportes},'{$tipo}',{$idVidDoc})";
        echo $sentencia;
        $resultado=mysqli_query($conexion, $sentencia);
        $sentencia="insert into personaReportaVidDoc(idVidDoc,idUsuario) values({$idVidDoc},{$idUsuario})";
        echo $sentencia;
        $resultado=mysqli_query($conexion, $sentencia);

    }else{
        echo "error1";
    }

}else{
    echo "error2";
}
mysqli_close($conexion);
?>