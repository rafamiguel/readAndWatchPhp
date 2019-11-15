<?PHP
include 'conexion.php';
$json=array();
/*Cargar Preguntas de Temas Libres*/
if(isset($_GET["fechaActual"])){ 
	$fechaActual = $_GET["fechaActual"];
    $consulta="select * from pregunta";
    $resultado=mysqli_query($conexion, $consulta);
    echo "hola";
    while($r=mysqli_fetch_array($resultado)){
    	echo  $r["fechaSubida"];
    	echo "<br>id:".$r["idPregunta"];

    }

    mysqli_close($conexion);
    echo json_encode($json);

}
?>