<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["tema"]) && isset($_GET["idUsuario"]) && isset($_GET["nombre"])){
            $tema=$_GET["tema"];
            $idUsuario=$_GET["idUsuario"];
            $nombre=$_GET["nombre"];
            $idTema = 1;

            $consulta="SELECT idTema from tema WHERE nombre= '".$tema."'";  
            $resultado=mysqli_query($conexion, $consulta);

            while($registro=mysqli_fetch_array($resultado)){
                $idTema = $registro['idTema'];
            }

            $consulta="insert into subtema (nombre,votos,idTema,idUsuario) values ('".$nombre."',0, ".$idTema.",".$idUsuario.")";
            $resultado=mysqli_query($conexion, $consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            }else{
            
             $resulta["consulta"]=$consulta;
   
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