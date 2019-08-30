<?PHP
include 'conexion.php';
$json=array();
 
/*Actualizar datos del admin*/
        if(isset($_GET["correo"]) && isset($_GET["nombre"]) && isset($_GET["apellidos"])&& 
          isset($_GET["contrasena"]) && isset($_GET["telefono"]) && isset($_GET["descripcion"])){
            $nombre=$_GET["nombre"];
            $apellidos=$_GET["apellidos"];
            $contrasena=$_GET["contrasena"];
            $correo=$_GET["correo"];
            $telefono=$_GET["telefono"];
            $descripcion=$_GET["descripcion"];

            $sentencia="UPDATE usuario SET nombre='".$nombre."',apellidos='".
            $apellidos."',contrasena='".$contrasena."',telefono='".$telefono."',
            descripcion='".$descripcion."' WHERE correo = '{$correo}'";  
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