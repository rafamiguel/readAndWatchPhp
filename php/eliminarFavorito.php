<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idFavorito"])){
        $idFavorito=$_GET['idFavorito'];
        $consulta="DELETE FROM favorito where idFavorito={$idFavorito}";  
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