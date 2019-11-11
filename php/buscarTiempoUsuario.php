<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["idUsuario"])){
            $idUsuario=$_GET["idUsuario"];
            $consulta="SELECT nombre, rutaFoto, ultimoInicio from usuario tipo='E'";  
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