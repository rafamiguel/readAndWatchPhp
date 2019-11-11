<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["idUsuario"])){
            $idUsuario=$_GET["idUsuario"];

/*SELECT comentario.texto, reportescom.tipo, castigo.castigo, reportescom.idCastigo from comentario INNER JOIN reportescom on comentario.idComentario = reportescom.idComentario INNER JOIN castigo on reportescom.idCastigo= castigo.idCastigo where comentario.eliminado='S' and comentario.idUsuario = 32 */

            $consulta="SELECT comentario.texto, reportescom.tipo, castigo.castigo, reportescom.idCastigo from comentario INNER JOIN reportescom on comentario.idComentario = reportescom.idComentario INNER JOIN castigo on reportescom.idCastigo= castigo.idCastigo where comentario.eliminado='S' and comentario.idUsuario = {$idUsuario}";  
            $resultado=mysqli_query($conexion, $consulta);
            while($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            
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