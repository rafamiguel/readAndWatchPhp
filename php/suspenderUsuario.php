<?PHP
include 'conexion.php';
$json=array();
 

/*UPDATE usuario set estado='N' where nombre ='Ariana' and apellidos = 'Espinoza' and tipo='E';*/
        if(isset($_GET["idUsuario"])){
            $idUsuario=$_GET["idUsuario"];
         
            $sentencia="UPDATE usuario SET estado='S' WHERE idUsuario = {$idUsuario} and tipo='E'";  
            if(mysqli_query($conexion, $sentencia)){
                $json['usuario'][]=array("success" => 1,
                "contrasena" => $contrasena, "nombre" => $nombre, "apellidos" => $apellidos,
                "telefono" => $telefono, "descripcion" => $descripcion, "tipo" => $tipo);
                echo json_encode($json);
            }else{
              $resulta["success"]=0;
              echo json_encode($json);
            }

        }
        else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
         mysqli_close($conexion);
?>