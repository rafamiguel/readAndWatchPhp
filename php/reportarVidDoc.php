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
    if($row[0]==0)
        $consulta="SELECT count(*) from personaReportaVidDoc where idVidDoc={$idVidDoc}";
        echo $consulta;
        $result = $conexion->query($consulta);
        $row = $result->fetch_row();
        $reportes=$row[0];
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
    }else{
        $resulta["repetido"]=1;
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