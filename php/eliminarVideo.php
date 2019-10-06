<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idVidDoc"])){
        $idVidDoc=$_GET['idVidDoc'];
        $consulta="DELETE FROM viddoc where idVidDoc={$idVidDoc}";  
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