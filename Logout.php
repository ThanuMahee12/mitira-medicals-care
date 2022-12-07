<?php

include ('Conf.php');

session_start();
if(isset($_SESSION['UserID'])){
    session_unset();
    session_destroy();
}


header('location:Login.php');

?>