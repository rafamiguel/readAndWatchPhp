<?PHP
$hostname_localhost="localhost";
$database_localhost="readandwatch";
$username_localhost="root";
$password_localhost="";
$conexion = new mysqli($hostname_localhost, $username_localhost, $password_localhost, $database_localhost); 
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["txtCorreo"])){
            $txtCorreo=$_GET["txtCorreo"];
            $consulta="SELECT nombre, apellidos, correo, contrasena from usuario WHERE correo = '{$txtCorreo}' and tipo='A'";  
            $resultado=mysqli_query($conexion, $consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $json['usuario'][] =$registro; 
            }else{
              $resulta["correo"]='';
              $resulta["contrasena"]='';
              $resulta["nombre"]='';
              $resulta["apellidos"]='';
   
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