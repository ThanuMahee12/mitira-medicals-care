<?php 
include('Conf.php');
    $mail=$_POST['mail'];
    $pass=$_POST['Password'];
    $sql="UPDATE `user` SET `Password`='$pass' WHERE `Email` = '$mail'";
    if($Ayushconnect->query($sql)){
       echo "ok";
    }
    else{
        echo "no";
    }


?>