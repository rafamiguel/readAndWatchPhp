<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["nombre"]) && isset($_GET["foto"])){
        $nombre=$_GET["nombre"];
        $foto=$_GET["foto"];
        $consulta="INSERT INTO materia(nombre,rutaImagen,votos,idUsuario) values(".$nombre.",".$foto.",0,1);"  
       echo $sentencia;
       $resultado=mysqli_query($conexion, $sentencia);
    }
    mysqli_close($conexion);
    
?>