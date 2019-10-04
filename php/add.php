 <?php

   $imagepic = $_FILES["logo"]["name"];
   echo $imagepic;
   $tempimgloc = $_FILES["logo"]["tmp_name"];
   echo $tempimgloc;
   $errorimg = $_FILES["logo"]["error"];
   echo $errorimg;

   if($errorimg > 0)
   {  
      echo "<strong> <font size='18'>There was a problem uploading your Logo. Please try again!</font></strong>";
  echo "<BR>";
   }
   else 
   {
      move_uploaded_file($tempimgloc, "https://readandwatch.000webhostapp.com/?dir=imagen/".$imagepic);
   }
?>