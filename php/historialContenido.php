<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["idUsuario"])){
            $idUsuario=$_GET["idUsuario"];

/*SELECT viddoc.ruta, viddoc.rutaImagen, reportesviddoc.tipo, castigo.castigo, reportesviddoc.idCastigo from viddoc INNER JOIN reportesviddoc on viddoc.idVidDoc = reportesviddoc.idVidDoc INNER JOIN castigo on reportesviddoc.idCastigo = castigo.idCastigo where viddoc.eliminado='S' and viddoc.idUsuario =32 */

            $consulta="SELECT viddoc.ruta, viddoc.rutaImagen, reportesviddoc.tipo, castigo.castigo, reportesviddoc.idCastigo from viddoc INNER JOIN reportesviddoc on viddoc.idVidDoc = reportesviddoc.idVidDoc INNER JOIN castigo on reportesviddoc.idCastigo= castigo.idCastigo where viddoc.eliminado='S' and viddoc.idUsuario = {$idUsuario}";  
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