<?PHP
include 'conexion.php';
$json=array();
/*Cargar la lista de temas*/
if($_GET("materia")){
	echo $_GET("materia");

    }

    mysqli_close($conexion);
    echo json_encode($json);
}
?>