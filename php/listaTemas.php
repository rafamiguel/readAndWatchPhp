<?PHP
include 'conexion.php';
$json=array();
/*Cargar la lista de temas*/
if($_GET("materia")){
	echo $_GET("materia");
    $consulta="select tema.nombre from tema inner join materia on tema.idMatera=materia.idMateria where materia.nombre='{$_GET("materia")}'";
    $resultado=mysqli_query($conexion, $consulta);
    while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
    }

    mysqli_close($conexion);
    echo json_encode($json);
}
?>