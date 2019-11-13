<?PHP
include 'conexion.php';
$json=array();

/*Cargar la lista de temas*/
if(isset($_GET["tema"])){
    $consulta="select subtema.nombre from subtema inner join tema on subtema.idTema=tema.idTema where tema.nombre='{$_GET["tema"]}'";
    $resultado=mysqli_query($conexion, $consulta);
    while($r=mysqli_fetch_array($resultado)){
        $json['usuario'][] = $r; 
    }

    
    echo json_encode($json);
}
	mysqli_close($conexion);
?>