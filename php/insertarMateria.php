<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["nombre"]) && isset($_GET["foto"])){
        $nombre=$_GET["nombre"];
        $rutaImagen=$_GET["rutaImagen"];
        $consulta="INSERT INTO materia(nombre,rutaImagen,votos,idUsuario) values('{$nombre}','{$foto}',0, 1);"  
       echo $consulta;
       $resultado=mysqli_query($conexion, $consulta);
    }
    mysqli_close($conexion);
    
?>