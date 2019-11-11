<?PHP
include 'conexion.php';
$json=array();
 
/*Actualizar datos del admin*/
        if(isset($_GET["idUsuario"]) && isset($_GET["datetime"])){
            $idUsuario=$_GET["idUsuario"];
            $datetime=$_GET["datetime"];

            $sentencia="UPDATE usuario SET ultimoInicio='".$datetime."' WHERE idUsuario = {$idUsuario}";  
            if(mysqli_query($conexion, $sentencia)){
                $json['usuario'][]=array("success" => 1,
                "contrasena" => $contrasena, "nombre" => $nombre, "apellidos" => $apellidos,
                "telefono" => $telefono, "descripcion" => $descripcion,);
                echo json_encode($json);
            }else{
              $resulta["success"]=0;
              $resulta["contrasena"]='';
              $resulta["nombre"]='';
              $resulta["apellidos"]='';
              $resulta["telefono"]='';
              $resulta["descripcion"]='';
              $json['usuario'][]=$resulta;
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