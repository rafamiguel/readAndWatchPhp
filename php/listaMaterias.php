<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar la lista de materias*/
            $consulta="select *from materia";
            $resultado=mysqli_query($conexion, $consulta);
            
            while($r=mysqli_fetch_array($resultado)){
                $json['usuario'][] = $r; 
            }

            mysqli_close($conexion);
            echo json_encode($json);
?>