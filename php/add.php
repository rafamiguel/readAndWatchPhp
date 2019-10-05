<?php
$web = 'files.000webhost.com';
$user = 'readandwatch';
$pass = 'Vergademono1';
// file location
$server_file = '/public_html/imagen/'.$_FILES["archivo"]['name'];
$local_file = $_FILES['archivo']['tmp_name'];
//connect
$conn_id = ftp_connect($web);
$login_result = ftp_login($conn_id,$user,$pass);
//uploading
if (ftp_put($conn_id, $server_file, $local_file, FTP_BINARY))
 {echo "Success";} 
else {echo "Failed";}
?>