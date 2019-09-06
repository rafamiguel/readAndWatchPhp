<?PHP
include 'conexion.php';
$json=array();

/*Cargar la lista de temas*/
if(isset($_GET["materia"])){
    $consulta="select tema.nombre from tema inner join materia on tema.idMatera=materia.idMateria where materia.nombre='".$_GET["materia"]."'";
    echo $consulta;
    $resultado=mysqli_query($conexion, $consulta);
    while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
    }

    
    echo json_encode($json);
}
	mysqli_close($conexion);
?>