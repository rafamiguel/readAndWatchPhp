<?PHP
include 'conexion.php';
$json=array();
/*Cargar los comentarios de video*/
if(isset($_GET["idVidDoc"]) && isset($_GET["tipo"]) && isset($_GET["idUsuario"])){
    $idVidDoc=$_GET["idVidDoc"];
    $tipo=$_GET["tipo"];
    $idUsuario=$_GET["idUsuario"];
    $consulta="select *from personaReportaVidDoc where idUsuario={$idUsuario}";
    echo $consulta;
    $resultado=mysqli_query($conexion, $consulta);
    if($registro=mysqli_fetch_array($resultado))
        $resulta["repetido"]=1;
        $json['usuario'][]=$resulta;
        $resulta["success"]=1;
        $json['usuario'][]+=$resulta;
        echo json_encode($json);
    }else{
        $reportes=mysql_result( mysql_query("SELECT count(*) from personaReportaVidDoc where idVidDoc={$idVidDoc}"), 0);
        $reportes++;
        $sentencia="insert into reportesviddoc(reportes,tipo,idVidDoc) values({$reportes},'{$tipo}',{$idVidDoc})";
        echo $sentencia;
        $resultado=mysqli_query($conexion, $sentencia);
        $sentencia="insert into personaReportaVidDoc(idVidDoc,idUsuario) values({$idVidDoc},{$idUsuario})";
        echo $sentencia;
        $resultado=mysqli_query($conexion, $sentencia);
        $resulta["repetido"]=0;
        $json['usuario'][]=$resulta;
        $resulta["success"]=1;
        $json['usuario'][]+=$resulta;
        echo json_encode($json);
    }

}else{
        $resulta["repetido"]=0;
        $json['usuario'][]=$resulta;
        $resulta["success"]=0;
        $json['usuario'][]+=$resulta;
      echo json_encode($json);
}
mysqli_close($conexion);
?>