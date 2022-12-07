<?php
include('Conf.php'); 
$actionChe=$_POST['actionChe'];
if($actionChe=="insertm"){
    $patientid=$_POST['userid'];
    $Doctorid=$_POST['Doctor'];
    $nowdate=$_POST['nowdate'];
    $description=$_POST['description'];
    $insertquery="INSERT INTO `chenlling` (`Paitenid`, `Doctorid`, `bookingDate`,`Descrption`) VALUES ('$patientid', '$Doctorid', '$nowdate','$description')";
    if($Ayushconnect->query($insertquery)){
        echo 'yes';
    }
    else{
        echo 'no';
    }
}
else if ($actionChe=="rejectappointment") {
    $id=$_POST['id'];
    $sql="UPDATE `chenlling` SET `Appointment` = '-1',`message` = 'Try agian using correct chenelling' WHERE `chenlling`.`ChenallingId` ='$id'";
    if($Ayushconnect->query($sql)){
        echo "ok";
    }

}
else if ($actionChe=="fixedappointment") {
   $bookingdate=$_POST['Appointmentdate'];
   $id=$_POST['chenlingid'];
   $sql="INSERT INTO `appointment` ( `Date`, `Chanellingid`) VALUES ( '$bookingdate', '$id');";
   if($Ayushconnect->query($sql)){
    $Appointmentid=$Ayushconnect->insert_id;
    $chanilgsql="UPDATE `chenlling` SET `Appointment` = '$Appointmentid',`ForBookDateTime` = '$bookingdate', `message` = 'Fixed appointment' WHERE `chenlling`.`ChenallingId` = '$id';";
    $Ayushconnect->query($chanilgsql);
   }
}
else if($actionChe=="cancelappointment"){
    $id=$_POST['id'];
    $deletequery="DELETE FROM `appointment` WHERE `Appointmentcode`='$id'";
    $chanilgsql="UPDATE `chenlling` SET `Appointment` = '-1',`ForBookDateTime` = '0', `message` = 'cancel Appointment' WHERE `chenlling`.`ChenallingId` = '$id';";
    $Ayushconnect->query($deletequery);
    $Ayushconnect->query($chanilgsql);

}
else if($actionChe=="payment") {
    echo "payment scusses";
 }
else if($actionChe="seeappointment"){
    $id=$_POST['id'];
    $sql="SELECT `appointment`.`Appointmentcode` AS `Appcode`, `appointment`.`Chanellingid` AS `chenelcode`, `chenlling`.`ForBookDateTime` AS `BookDate`, `chenlling`.`Descrption` AS `des`, `chenlling`.`Reportno` AS `report`, `report`.`Descrption` AS `redes`, `report`.`Medicine` AS `Medicnes`, `user`.`UserName` AS `username`, `user`.`UserID`
    FROM `appointment`
        , `chenlling`
        , `report`
        , `user`
        ,`paient`
    WHERE `user`.`UserID` = `paient`.`PaientId` AND `appointment`.`Appointmentcode` = ' $id';";
    $res=$Ayushconnect->query($sql);
    while($row=mysqli_fetch_assoc($res)){
            echo "<div class='card w-100 text-center'>
            <div class='card-body'>
                <h4>".$row['Appcode']."</h4>
              <h5 class='card-title'>".$row['Appcode']."</h5>
              <p class='card-text'>".$row['BookDate']."</p>
              <p class='card-text'>".$row['des']."</p>
            </div>
            <div class='card-body'>
              <h6>".$row['redes']."</h6>
              <p>".$row['Medicnes']."</p>
            </div>
          </div>";
    }

}

?>