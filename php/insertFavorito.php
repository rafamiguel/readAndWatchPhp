<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idUsuario"]) && isset($_GET["idVidDoc"])){
        $idUsuario=$_GET["idUsuario"];
        $idVidDoc=$_GET["idVidDoc"];
        $consulta="INSERT INTO favorito (idUsuario,idVidDoc) values(".$idUsuario.",".$idVidDoc.")";  
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