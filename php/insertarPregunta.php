<?PHP
include 'conexion.php';
$json=array();
/*Se insertará en la bd las preguntas que se realizan*/
if(isset($_GET["idPregunta"]) && isset($_GET["titulo"]) && isset($_GET["descripcion"])  && isset($_GET["eliminado"]) && isset($_GET["idUsuario"])){

	$idPregunta=$_GET["idPregunta"];
    $titulo=$_GET["titulo"];
    $descripcion=$_GET["descripcion"];
    $idReportesPreg=$_GET["idReportesPreg"];
    $idUsuario=$_GET["idUsuario"];
    $eliminado=$_GET["eliminado"];

    $sentencia="insert into pregunta 
    (idPregunta,titulo,descripcion,eliminado,idUsuario) values({$idPregunta},'{$titulo}', '{$descripcion}','{$eliminado}',{$idUsuario}) ";
    echo $sentencia;
    $resultado=mysqli_query($conexion, $sentencia);
	}
	mysqli_close($conexion);
?>