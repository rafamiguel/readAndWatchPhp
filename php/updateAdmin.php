<?PHP
include 'conexion.php';
$json=array();
 
/*Actualizar datos del admin*/
        if(isset($_GET["correo"]) && isset($_GET["nombre"]) && isset($_GET["apellidos"])&& 
          isset($_GET["contrasena"])){
            $nombre=$_GET["nombre"];
            $apellidos=$_GET["apellidos"];
            $contrasena=$_GET["contrasena"];


            $sentencia="UPDATE usuario SET nombre='".$nombre."',apellidos='".
            $apellidos"',contrasena='".$contrasena."'
             WHERE correo = '{$txtCorreo}';";  
            $resultado=mysqli_query($conexion, $sentencia);
            if(mysqli_affected_rows($resultado)>0){
                $resulta["success"]=1;
                echo json_encode($json);
            }else{
              $resulta["success"]=0;
              echo json_encode($json);
              $resulta["correo"]='';
              $resulta["contrasena"]='';
              $resulta["nombre"]='';
              $resulta["apellidos"]='';
              $resulta["telefono"]='';
              $resulta["descripcion"]='';
              $json['usuario'][]=$resulta;
            }

        }
        else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
         mysqli_close($conexion);
?>