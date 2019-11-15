<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["materia"]) && isset($_GET["semestre"]) && isset($_GET["idUsuario"]) && isset($_GET["nombre"])){
            $materia=$_GET["materia"];
            $semestre=$_GET["semestre"];
            $idUsuario=$_GET["idUsuario"];
            $nombre=$_GET["nombre"];
            
            $idMateria = 1;
            $consulta="SELECT idMateria from materia WHERE nombre= ".$materia;  
            $resultado=mysqli_query($conexion, $consulta);

            while($registro=mysqli_fetch_array($resultado)){
                $idMateria = $registro['idMateria'];
            }

            $consulta="insert into tema (nombre,votos,semestre,idMateria,idUsuario) values ('".$nombre."',0, ".$semestre.", ".$idMateria.",".$idUsuario.")";
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