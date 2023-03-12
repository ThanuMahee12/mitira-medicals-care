<?php
    $systemjsonfile=file_get_contents('JSON/Ayush.json');
    $Ayush=json_decode($systemjsonfile,true);
    $db=$Ayush["db"];
    $connect=mysqli_connect($db["host"],$db["user"],$db["password"],$db["name"]);
?>