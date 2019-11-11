<?PHP
include 'conexion.php';
$json=array();
 
/*Comprobar si existe el usuario o no*/
        if(isset($_GET["nombre"]) ){
            $nombre=$_GET["nombre"];
            $tipo=$_GET["tipo"];

            $consulta="delete from usuario WHERE nombre = '{$nombre}' and tipo = 'E'";  

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