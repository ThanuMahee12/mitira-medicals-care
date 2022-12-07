<?php 
session_start();
include("Conf.php");
$action=$_POST['actionp'];
    if($action=='insert'){
        
        $FullName=$_POST['FullName'];
        $Username=$_POST['Username'];
        $Email=$_POST['Email'];
        $Mobile=$_POST['Mobile'];
        $DOB=$_POST['DOB'];
        $NIC=$_POST['NIC'];
        $BloodGroup=$_POST['BloodGroup'];
        $Gender=$_POST['Gender'];
        $Address=$_POST['Address'];
        $Password='123456';
        $Special=$_POST['Special'];
        $height=$_POST['Height'];
        $Weight=$_POST['Weight'];
        $insertUser="INSERT INTO `user` (`UserName`, `Password`, `FullName`, `Category`, `Gender`, `DateOfBirth`, `Mobileno`, `Email`, `NIC`, `Address`) VALUES ('$Username', '$Password', '$FullName', 'Customer', '$Gender', '$DOB', '$Mobile', '$Email', '$NIC', '$Address');";
        $userres=$Ayushconnect->query($insertUser);
        $patientid=$Ayushconnect->insert_id;
        $insertPaitent="INSERT INTO `paient` (`PaientId`, `BloodGroup`, `Height`, `Wight`, `Alergy`, `PaidSatus`) VALUES ('$patientid', '$BloodGroup', '$height', '$Weight', '$Special', 'Paid');";
        if($Ayushconnect->query($insertPaitent)){
            
                    echo "   <tr id='$patientid'>
                    <td>.$Username.</td>
                    <td>.$FullName.</td>
                    <td>.$DOB.</td>
                    <td>.$Address.</td>
                    <td>.$Email.</td>
                    <td>.$Mobile.</td>
                    <td>.$Gender.</td>
                    <td>.$BloodGroup.</td>
                    <td>Paid</td>
                    <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                        <button type='button' class='btn btn-danger' id='deletep'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        <button type='button' class='btn btn-warning' id='editp'><i class='fa-solid fa-pen'></i></button>
                    </div>
                    </td>
                </tr>";
       }
        else{
            echo false;
        }
    }
    else if ($action=="update") {
        $UserID=$_POST['idinifyp'];
        $FullName=$_POST['FullName'];
        $Username=$_POST['Username'];
        $Email=$_POST['Email'];
        $Mobile=$_POST['Mobile'];
        $DOB=$_POST['DOB'];
        $NIC=$_POST['NIC'];
        $BloodGroup=$_POST['BloodGroup'];
        $Gender=$_POST['Gender'];
        $Address=$_POST['Address'];
        $Password='123456';
        $PaidStatus=$_POST['PaidStatus'];
        $UpdatetUser="UPDATE `user` SET `UserName`='$Username', `Password`='$Password', `FullName`='$FullName', `Gender`='$Gender', `DateOfBirth`='$DOB', `Mobileno`='$Mobile', `Email`='$Email', `NIC`='$NIC', `Address`='$Address' WHERE `UserID`='$UserID'";
        $userres=$Ayushconnect->query($UpdatetUser);
        $UpdatePaitent="UPDATE `paient` SET  `PaidSatus`='$PaidStatus' WHERE `PaientId`='$UserID'";
        if($Ayushconnect->query($UpdatePaitent)){
                           
            echo "
            <td>.$Username.</td>
            <td>.$FullName.</td>
            <td>.$DOB.</td>
            <td>.$Address.</td>
            <td>.$Email.</td>
            <td>.$Mobile.</td>
            <td>.$Gender.</td>
            <td>.$BloodGroup.</td>
            <td>Paid</td>
            <td>
            <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                <button type='button' class='btn btn-danger' id='deletep'><i class='fa fa-trash' aria-hidden='true'></i></button>
                <button type='button' class='btn btn-warning' id='editp'><i class='fa-solid fa-pen'></i></button>
            </div>
            </td>";
        }
        else{
            echo false;
        }
    }
    else if($action=="updateperson"){
        $updateid=$_POST['updateid'];
        $searchbyidsql="SELECT `paient`.`PaientId` AS `PaientId`, `user`.`UserName` AS `PaientName`, `paient`.`Height` AS `Height`, `paient`.`Wight` AS `Weight`, `paient`.`Alergy` AS `Special`,`user`.`Gender` AS `Gender`, `user`.`DateOfBirth` AS `DOB`, `user`.`Password` AS `Password`, `user`.`Mobileno` AS `Mobilno`, `user`.`Email` AS `Email`, `user`.`NIC` AS `NIC`, `paient`.`BloodGroup` AS `BloodGroup`, `paient`.`PaidSatus` AS `Paid`, `user`.`FullName` AS `FullName`,`user`.`Address` AS `Address`
        FROM `paient` 
            LEFT JOIN `user` ON `paient`.`PaientId` = `user`.`UserID` WHERE `user`.`UserID` = '$updateid'";
        $rowsearch=$Ayushconnect->query($searchbyidsql);
        $sersltpu='';
        while($row=mysqli_fetch_assoc($rowsearch)){
            $sersltpu.=$row['PaientId'].'_';
            $sersltpu.=$row['PaientName'].'_';
            $sersltpu.=$row['Gender'].'_';
            $sersltpu.=$row['DOB'].'_';
            $sersltpu.=$row['Mobilno'].'_';
            $sersltpu.=$row['Email'].'_';
            $sersltpu.=$row['NIC'].'_';
            $sersltpu.=$row['BloodGroup'].'_';
            $sersltpu.=$row['Paid'].'_';
            $sersltpu.=$row['FullName'].'_';
            $sersltpu.=$row['Height'].'_';
            $sersltpu.=$row['Weight'].'_';
            $sersltpu.=$row['Special'].'_';
            $sersltpu.=$row['Address'].'_';
            $sersltpu.=$row['Password'].'_';
        }
        echo $sersltpu;
    }
    else if ($action=="delete"){
        $Deletestatus=$_POST['table'];
        $UserID=$_POST['Patientid'];
        $DeletePaient="DELETE FROM `paient` WHERE `PaientId`='$UserID'";
        $DeleteUser="DELETE FROM `user` WHERE `UserID`='$UserID'";
        if($Deletestatus=="OK"){
            if($Ayushconnect->query($DeletePaient)){
                if($Ayushconnect->query($DeleteUser)){
                    echo true;
                }else{
                    echo false;
                }
            }
            else{
                echo false;
            }
        }
        else{
            if($Ayushconnect->query($DeletePaient)){
                echo true;
            }
            else{
                echo false;
            }

        }
       
    }


?>