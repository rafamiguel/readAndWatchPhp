<?PHP
include 'conexion.php';
   
     if(isset($_POST["rutaImagen"] && isset($_POST["nombre"])){
        $nombre=$_POST["nombre"];

        $rutaImagen=$_POST["rutaImagen"];
       

        $path = "imagen/$nombre.jpg";
        $url= "https://readandwatch.000webhostapp.com/?dir=./$path";
       

        file_put_contents($path, base64_decode($rutaImagen));
        $bytesArchivo=file_get_contents($path);

        //$consulta="INSERT INTO materia(nombre,rutaImagen,votos,idUsuario) values('".$nombre."','".$bytesArchivo."',0, 1)";  
        //if($resultado=mysqli_query($conexion, $consulta)){
           echo "registra";
         }else {echo "no registra"}
        //}else{
         // echo "no registra";
        //}
       //mysqli_close($conexion);


        
       
?>