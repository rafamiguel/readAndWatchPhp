<?php
$target_dir = "https://readandwatch.000webhostapp.com/?dir=imagen/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
}
?>