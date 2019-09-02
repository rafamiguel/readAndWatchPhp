<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idUsuario"]) && isset($_GET["idTema"]) && isset($_GET["tipo"])){
        $idUsuario=$_GET["idUsuario"];
        $idVidDoc=$_GET["idTema"];
        $tipo=$_GET["tipo"];
        $consulta="SELECT idVidDoc, idUsuario from usuario WHERE idTema= ".$idTema." and idUsuario=".$idUsuario."and tipo=".$tipo;  
        $resultado=mysqli_query($conexion, $consulta);
        if($registro=mysqli_fetch_array($resultado)){
            $json['usuario'][] =array("existente"=>1,); 
        }else{
          $resulta["idUsuario"]='';
          $resulta["idVidDoc"]='';
          $resulta["existente"]=array("existente"=>1,);
          $json['usuario'][]=$resulta;
        }

        mysqli_close($conexion);
        echo json_encode($json);
    }
    else{
      $resulta["success"]=0;
      $json['usuario'][]=$resulta;
      echo json_encode($json);
    }
?>