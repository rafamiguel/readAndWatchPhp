<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
        if(isset($_GET["idTema"]) && isset($_GET["tipo"])){
            $idTema=$_GET["idTema"];
            $tipo=$_GET["tipo"];
            $consulta="SELECT * from vidDoc WHERE idTema= ".$idTema."and tipo=".$tipo;
            $resultado=mysqli_query($conexion, $consulta);
            $rowCount=mysqli_num_rows($resultado);
            if($registro=mysqli_fetch_array($resultado)){
                $registro+=array("existente"=>1,
                                  "cantidad"=>$rowCount);
                $json['usuario'][] = $registro; 
            }else{
              $resulta["existente"]=array("existente"=>-1,);
              $json['usuario'][]=$resulta;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
        else{
          $resulta["success"]=0;
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
 
?>