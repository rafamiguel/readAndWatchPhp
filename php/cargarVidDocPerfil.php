<?PHP
include 'conexion.php';
$json=array();
;
/*Cargar los comentarios de video*/
        if(isset($_GET["idUsuario"]) && isset($_GET["tipo"])){
            $idUsuario=$_GET["idUsuario"];
            $tipo=$_GET["tipo"];
            $consulta="select *from viddoc WHERE idUsuario= ".$idUsuario." and tipo='".$tipo."'";
            $resultado=mysqli_query($conexion, $consulta);
            //$rowCount=mysqli_num_rows($resultado);
            
            while($r=mysqli_fetch_array($resultado)){
                //$status=array("existente"=>1,"cantidad"=>$rowCount,);
                $json['usuario'][] = $r; 
                
                //$json['status'][]=$status;
            }

            mysqli_close($conexion);
            echo json_encode($json);
        }
?>