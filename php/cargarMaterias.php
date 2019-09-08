<?PHP
include 'conexion.php';
$json=array();

/*Cargar las materias*/
$consulta="SELECT * from materia";  
$resultado=mysqli_query($conexion, $consulta);
while($registro=mysqli_fetch_array($resultado)){
    $registro+=array("existente"=>1,);
    $json['usuario'][] = $registro; 
}

mysqli_close($conexion);
echo json_encode($json);
 
?>