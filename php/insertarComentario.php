<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idUsuario"]) && isset($_GET["idTema"]) && isset($_GET["tipo"]) && isset($_GET["comentario"])){
        $idUsuario=$_GET["idUsuario"];
        $comentario=$_GET["comentario"];
        $tipo=$_GET["tipo"];
        $consulta="INSERT INTO comentario(idTema,comentario,tipo) values(".$idTema.",".$comentario.",".$tipo.");";  
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