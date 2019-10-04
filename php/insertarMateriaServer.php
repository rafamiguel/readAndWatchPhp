<?PHP
include 'conexion.php';


   
        $nombre=$_POST["nombre"];
        $rutaImagen=$_POST["rutaImagen"];
        $path = "$nombre.jpg";
        //$url= "https://readandwatch.000webhostapp.com/?dir=./$path";
        $url = "http://127.0.0.1/img/$path";
       

        file_put_contents($path, base64_decode($rutaImagen));
        $bytesArchivo=file_get_contents($path);

        echo "registra";
       
?>