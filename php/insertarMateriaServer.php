<?PHP
include 'conexion.php';


   
        $nombre=$_POST["nombre"];
        $rutaImagen=$_POST["rutaImagen"];
        $path = "imagen/$nombre.jpg";
        $url= "https://readandwath.000webhostapp.com/?dir=./$path";
       

        file_put_contents($path, base64_decode($rutaImagen));
        $bytesArchivo=file_get_contents($path);

        echo "registra";
       
?>