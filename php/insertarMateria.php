<?PHP
include 'conexion.php';
$json=array();

/*Comprobar si se ha hecho un comentario antes*/
    if(isset($_GET["idMateria"]) && isset($_GET["nombre"]) && isset($_GET["foto"])){
      $idMateria=$_GET["idMateria"];
        $nombre=$_GET["nombre"];
        $foto=$_GET["rutaImagen"];
        $consulta="INSERT INTO materia(idMateria,nombre,rutaImagen,votos,idUsuario) values({$idMateria},'{$nombre}','{$foto}', 0, 1);"  
       echo $consulta;
       $resultado=mysqli_query($conexion, $consulta);
    }
    mysqli_close($conexion);
    
?>