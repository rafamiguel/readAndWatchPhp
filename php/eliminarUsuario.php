<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["nombre"]) && isset($_GET["apellidos"])  && isset($_GET["tipo"])){
            $nombre=$_GET["nombre"];
            $apellidos=$_GET["apellidos"];
            $tipo=$_GET["tipo"];

            $consulta="delete from usuario WHERE nombre = '{$nombre}' and apellidos = '{$apellidos}' and tipo = '{$tipo}'";  

            if($resultado=mysqli_query($conexion, $consulta)){
            $json['usuario'][] =array("exito"=>1,);
              }else{
                $resulta['usuario']=array("exito"=>-1,);
                $json['usuario'][]=$resulta;
               }

        mysqli_close($conexion);
        echo json_encode($json);
    }
/*Comprobar si existe el usuario o no*/
 
?>