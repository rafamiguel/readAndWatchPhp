<?PHP
include 'conexion.php';
$json=array();
/*Cargar Preguntas de Temas Libres*/
	
            $consulta="select *from pregunta";
            $resultado=mysqli_query($conexion, $consulta);
            
            while($r=mysqli_fetch_array($resultado)){
                //$status=array("existente"=>1,"cantidad"=>$rowCount,);
                $json['usuario'][] = $r; 
                
                //$json['status'][]=$status;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
?>