<?PHP
include 'conexion.php';
$json=array();

/*Cargar los comentarios de video*/
        if(isset($_GET["idTema"])){
            $idTema=$_GET["idTema"];
            $consulta="SELECT * from usuario WHERE idTema= ".$idTema;  
            $resultado=mysqli_query($conexion, $consulta);
            if($registro=mysqli_fetch_array($resultado)){
                $registro+=array("existente"=>1,);
                $json['usuario'][] = $registro; 
            }else{
              $resulta["idVidDoc"]='';
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