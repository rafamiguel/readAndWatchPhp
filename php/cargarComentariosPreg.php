<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
if(isset($_GET["idPregunta"])){
    $idPregunta=$_GET["idPregunta"];
    $consulta="SELECT * from comentario WHERE idPregunta= ".$idPregunta;  
    $resultado=mysqli_query($conexion, $consulta);
    while($registro=mysqli_fetch_array($resultado)){
        $registro+=array("existente"=>1,);
        $json['usuario'][] = $registro; 
    }

    mysqli_close($conexion);
    echo json_encode($json);
}
else{
  $resulta["success"]=0;
  $json['usuario'][]=$resulta;
  echo json_encode($json);
}
?>