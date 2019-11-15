<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["nombre"]) && isset($_GET["rutaImagen"]) && isset($_GET["idUsuario"])){
        $nombre=$_GET["nombre"];
        $rutaImagen=$_GET["rutaImagen"];
        $idUsuario = $_GET["idUsuario"];
        $consulta="INSERT INTO materia(nombre,rutaImagen,votos,idUsuario) values('".$nombre."','".$rutaImagen."',0, {$idUsuario})";   

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