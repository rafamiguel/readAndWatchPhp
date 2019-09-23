<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idUsuario"]) && isset($_GET["idPregunta"]) && isset($_GET["texto"])){
        $idUsuario=$_GET["idUsuario"];
        $texto=$_GET["texto"];
        $idPregunta=$_GET["idPregunta"];
        $consulta="INSERT INTO comentario(idUsuario,idPregunta,texto,idReportesCom) values(".$idUsuario.",".$idPregunta.",'".$texto."',1)";  
        if($resultado=mysqli_query($conexion, $consulta)){
            $json['usuario'][] =array("exito"=>1,);
        }else{
          $resulta['usuario']=array("exito"=>-1,);
          $json['usuario'][]=$resulta;
        }

        mysqli_close($conexion);
        echo json_encode($json);
    }
    else{
      $resulta["exito"]=0;
      $json['usuario'][]=$resulta;
      echo json_encode($json);
    }
?>