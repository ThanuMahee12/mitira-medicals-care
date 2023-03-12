<?php
    $systemjsonfile=file_get_contents('JSON/Ayush.json');
    $Ayush=json_decode($systemjsonfile,true);
   if($_POST["mydata"]=="System"){
        echo $systemjsonfile;
   }
    
?>