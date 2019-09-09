<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idUsuario"]) && isset($_GET["idVidDoc"]) && isset($_GET["texto"])){
        $idUsuario=$_GET["idUsuario"];
        $texto=$_GET["texto"];
        $idVidDoc=$_GET["idVidDoc"];
        $consulta="INSERT INTO comentario(idVidDoc,texto,tipo,idReportesCom) values(".$idVidDoc.",".$comentario.",".$tipo.",1);";  
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