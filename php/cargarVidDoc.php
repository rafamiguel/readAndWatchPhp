<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
        if(isset($_GET["idTema"]) && isset($_GET["tipo"])){
            $idTema=$_GET["idTema"];
            $tipo=$_GET["tipo"];
            $consulta="SELECT * from vidDoc WHERE idTema= ".$idTema."and tipo=".$tipo;
            echo $consulta;
            $resultado=mysqli_query($conexion, $consulta);
            $rowCount=mysqli_num_rows($resultado);
            if($registro=mysqli_fetch_array($resultado)){
                $status=array("existente"=>1,"cantidad"=>$rowCount,);
                $json['usuario'][] = $registro; 
                $json['status'][]=$status;
            }else{
              $resulta["existente"]=array("existente"=>-1,);
              $json['usuario'][]=$resulta;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
        else{
          $resulta["success"]=-1;
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
 
?>