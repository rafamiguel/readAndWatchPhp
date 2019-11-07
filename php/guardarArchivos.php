<?php
  
    $file_path = "../archivos/";
     
    $file_path = $file_path . $_REQUEST['nombre'];
    if(move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $file_path)) {
        echo "success";
    } else{
        echo "fail";
    }
 ?>