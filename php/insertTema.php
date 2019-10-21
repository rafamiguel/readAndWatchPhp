<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["idMateria"]) && isset($_GET["semestre"]) && isset($_GET["idUsuario"]) && isset($_GET["nombre"])){
            $idMateria=$_GET["idMateria"];
            $semestre=$_GET["semestre"];
            $idUsuario=$_GET["idUsuario"];
            $nombre=$_GET["nombre"];

            $consulta="insert into tema (nombre,votos,semestre,idMateria,idUsuario) values ('".$nombre."',0, ".$semestre.", ".$idMateria.",".$idUsuario.")";
            $resultado=mysqli_query($conexion, $consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            }else{
            
             $resulta["idTema"]='';
   
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