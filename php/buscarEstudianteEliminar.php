<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["nombre"]) && isset($_GET["apellidos"])){
            $nombre=$_GET["nombre"];
            $apellidos=$_GET["apellidos"];

            $consulta="SELECT nombre, apellidos, rutaFoto from usuario WHERE nombre = '{$nombre}' and apellidos = '{$apellidos}'";  
            echo $consulta;
            $resultado=mysqli_query($conexion, $consulta);

            if($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            }else{
              $resulta["correo"]='';
              $resulta["contrasena"]='';
              $resulta["nombre"]='';
              $resulta["apellidos"]='';
              $resulta["telefono"]='';
              $resulta["descripcion"]='';
              
   
              $json['usuario'][]=$resulta;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
/*Comprobar si existe el usuario o no*/
 
?>