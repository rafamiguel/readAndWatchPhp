<?PHP
include 'conexion.php';
$json=array();
 
/*Actualizar datos del admin*/
        if(isset($_GET["correo"]) && isset($_GET["nombre"]) && isset($_GET["apellidoP"]) && isset($_GET["apellidoM"]) && 
          isset($_GET["contrasena"])){
          echo "Hola";
            $nombre=$_GET["nombre"];
            $apellidop=$_GET["apellidoP"];
            $apellidoM=$_GET["apellidoM"];
            $contrasena=$_GET["contrasena"];


            $sentencia="UPDATE usuario SET nombre='".$nombre."',apellidoP='".$apellidoP."',
            apellidoM='".$apellidoM."',contrasena='".$contrasena."'
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