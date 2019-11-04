<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["idUsuario"]) && isset($_GET["idVidDoc"]) ){
            $idUsuario=$_GET["idUsuario"];
            $idVidDoc=$_GET["idVidDoc"];

            $consulta="SELECT idComentario from comentario WHERE idUsuario = {$idUsuario} and idVidDoc = {$idVidDoc}";  
            $resultado=mysqli_query($conexion, $consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            }else{
              $resulta["idComentario"]=0;
              $json['usuario'][]=$resulta;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
        else{
          $resulta["success"]=0;
          $resulta["message"]='WS no retorna';
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
/*Comprobar si existe el usuario o no*/
 
?>