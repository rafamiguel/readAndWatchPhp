<?PHP
include 'conexion.php';


/*Comprobar si se ha hecho un comentario antes*/
   
        $nombre=$_POST["nombre"];
        $rutaImagen=$_POST["rutaImagen"];
        $path = "imagen/$nombre.jpg";
        $url= "https://readandwatch.000webhostapp.com/$path"

        file_put_contents($path, base64_decode($rutaImagen));
        $bytesArchivo=file_get_contents($path);

        echo "registra";
        //$consulta="INSERT INTO materia(nombre,rutaImagen,votos,idUsuario) values('".$nombre."','".$rutaImagen."',0, 1)";   

       /*if($resultado=mysqli_query($conexion, $consulta)){
            $json['usuario'][] =array("exito"=>1,);
        }else{
          $resulta['usuario']=array("exito"=>-1,);
          $json['usuario'][]=$resulta;
        } */

       // mysqli_close($conexion);
        //echo json_encode($json);
  
   /* else{
      $resulta["exito"]=0;
      $json['usuario'][]=$resulta;
      echo json_encode($json);
    }
    */
?>