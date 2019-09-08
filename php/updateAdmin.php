<?PHP
include 'conexion.php';
$json=array();
 
/*Actualizar datos del admin*/
        if(isset($_GET["idUsuario"]) && isset($_GET["nombre"]) && isset($_GET["apellidos"])&& 
          isset($_GET["contrasena"])){
            $nombre=$_GET["nombre"];
            $apellidos=$_GET["apellidos"];
            $contrasena=$_GET["contrasena"];
            $idUsuario=$_GET["idUsuario"];

            $sentencia="UPDATE usuario SET nombre='".$nombre."',apellidos='".
            $apellidos."',contrasena='".$contrasena."'
             WHERE idUsuario = {$idUsuario}";  
            if(mysqli_query($conexion, $sentencia)){
                $json['usuario'][]=array("success" => 1,
                "contrasena" => $contrasena, "nombre" => $nombre,
                "nombre" => $nombre, "apellidos" => $apellidos,);
                echo json_encode($json);
            }else{
              $resulta["success"]=0;
              $resulta["contrasena"]='';
              $resulta["nombre"]='';
              $resulta["apellidos"]='';
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