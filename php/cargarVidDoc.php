<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
        if(isset($_GET["idTema"]) && isset($_GET["tipo"])){
            $idTema=$_GET["idTema"];
            $tipo=$_GET["tipo"];
            $consulta="SELECT * from viddoc WHERE idTema= ".$idTema." and tipo='".$tipo."'";
            $resultado=mysqli_query($conexion, $consulta);
            $rowCount=mysqli_num_rows($resultado);
            echo $consulta;
            while($r=mysqli_fetch_assoc($resultado)){
                //$status=array("existente"=>1,"cantidad"=>$rowCount,);
                $json['usuario'][] = $r; 
                echo json_encode($json);
                //$json['status'][]=$status;
            }else{
              $resulta["existente"]=array("existente"=>-1,);
              $json['usuario'][]=$resulta;
            }

            mysqli_close($conexion);
            
        }
        else{
          $resulta["success"]=-1;
          $json['usuario'][]=$resulta;
          echo json_encode($json);
        }
 
?>