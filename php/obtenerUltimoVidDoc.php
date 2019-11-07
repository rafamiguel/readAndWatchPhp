<?PHP
include 'conexion.php';
$json=array();

$sentencia = "select idVidDoc from viddoc";
$resultado=mysqli_query($conexion, $sentencia);
$id = 0;
while($registro=mysqli_fetch_array($resultado)){
    $id = $registro['idVidDoc']; 
}
$resulta=array("idVidDoc"=>$id,);
$json['vidDoc'][] = $resulta; 
echo json_encode($json);

mysqli_close($conexion);
?>