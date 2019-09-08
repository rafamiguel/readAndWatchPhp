<?PHP
include 'conexion.php';
$json=array();

/*Cargar los temas de esa materia y de ese semestre*/
if(isset($_GET["idMateria"]) && isset($_GET["semestre"])){
    $idMateria=$_GET["idMateria"];
    $semestre$_GET["semestre"];
    $consulta="SELECT * from tema WHERE idMateria= ".$idMateria." and semestre=".$semestre;  
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