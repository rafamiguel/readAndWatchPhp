<?PHP
include 'conexion.php';
$json=array();
/*Se insertará en la bd las preguntas que se realizan*/
if(isset($_GET["idPregunta"]) && isset($_GET["titulo"]) && isset($_GET["descripcion"]) && isset($_GET["idUsuario"])){

	$idPregunta=$_GET["idPregunta"];
    $titulo=$_GET["titulo"];
    $descripcion=$_GET["descripcion"];
    $idReportesPreg=$_GET["idReportesPreg"];
    $idUsuario=$_GET["idUsuario"];

    $sentencia="insert into pregunta 
    (idPregunta,titulo,descripcion,idReportesPreg,idUsuario) values({$idPregunta},'{$titulo}', '{$descripcion}',{$idUsuario}) ";
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
	}
	mysqli_close($conexion);
?>