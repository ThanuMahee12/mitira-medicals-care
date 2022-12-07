<?php 
session_start();
include("Conf.php");
$action=$_POST['actiond'];
    if($action=='insert'){
        
        $FullName=$_POST['FullName'];
        $Username=$_POST['Username'];
        $Email=$_POST['Email'];
        $Mobile=$_POST['Mobile'];
        $DOB=$_POST['DOB'];
        $NIC=$_POST['NIC'];
        $Classfication=$_POST['Classfication'];
        $Gender=$_POST['Gender'];
        $Address=$_POST['Address'];
        $Password='123456';
        $Qulification=$_POST['Qulification'];
        $Salary=$_POST['Salary'];
        $Dname=rand(1000,20000)."-".$_FILES["DoctorImage"]["name"];
        $temname=$_FILES["DoctorImage"]["tmp_name"];
        $upload_dirdoc='img\uploads\Doctor';
        move_uploaded_file($temname,$upload_dirdoc.'/'.$Dname);
        $imgefile= "img/uploads/Doctor/". $Dname;
        $insertUser="INSERT INTO `user` (`UserName`, `Password`, `FullName`, `Category`, `Gender`, `DateOfBirth`, `Mobileno`, `Email`, `NIC`, `Address`) VALUES ('$Username', '$Password', '$FullName', 'Doctor', '$Gender', '$DOB', '$Mobile', '$Email', '$NIC', '$Address');";
        $userres=$Ayushconnect->query($insertUser);
        $Doctorid=$Ayushconnect->insert_id;
        $insertDoctor="INSERT INTO `doctor` (`Doctorid`, `classification`, `Image`, `qulification`, `Price`) VALUES ('$Doctorid', '$Classfication', '$imgefile', '$Qulification', '$Salary');";
        if($Ayushconnect->query($insertDoctor)){
            
                    echo "   <tr id='$Doctorid'>
                    <td>.$Username.</td>
                    <td>.$FullName.</td>
                    <td>.$Classfication.</td>
                    <td>.$Address.</td>
                    <td>.$Email.</td>
                    <td>.$Mobile.</td>
                    <td>.$Salary.</td>
                    <td>.<img class='img-thumbnail' src='$imgefile' alt='$imgefile'>.</td>
                    <td>.$Qulification.</td>
                    <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                        <button type='button' class='btn btn-danger' id='deleted'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        <button type='button' class='btn btn-warning' id='editd'><i class='fa-solid fa-pen'></i></button>
                    </div>
                    </td>
                </tr>";
       }
        else{
            echo false;
        }
    }
    else if ($action=="update") {
        $UserID=$_POST['idinifyd'];
        $FullName=$_POST['FullName'];
        $Username=$_POST['Username'];
        $Email=$_POST['Email'];
        $Mobile=$_POST['Mobile'];
        $DOB=$_POST['DOB'];
        $NIC=$_POST['NIC'];
        $Classfication=$_POST['Classfication'];
        $Gender=$_POST['Gender'];
        $Address=$_POST['Address'];
        $Password='123456';
        $Qulification=$_POST['Qulification'];
        $Salary=$_POST['Salary'];
        $Dname=rand(1000,20000)."-".$_FILES["DoctorImage"]["name"];
        $temname=$_FILES["DoctorImage"]["tmp_name"];
        $upload_dirdoc='img\uploads\Doctor';
        move_uploaded_file($temname,$upload_dirdoc.'/'.$Dname);
        $imgefile= "img/uploads/Doctor/". $Dname;
        $UpdatetUser="UPDATE `user` SET `UserName`='$Username', `Password`='$Password', `FullName`='$FullName', `Gender`='$Gender', `DateOfBirth`='$DOB', `Mobileno`='$Mobile', `Email`='$Email', `NIC`='$NIC', `Address`='$Address' WHERE `UserID`='$UserID'";
        $userres=$Ayushconnect->query($UpdatetUser);
        $UpdateDoctor="UPDATE `doctor` SET  `classification`='$Classfication', `Image`='$imgefile', `qulification`='$Qulification', `Price`='$Salary' WHERE `Doctorid`='$UserID';";
        if($Ayushconnect->query($UpdateDoctor)){
                           
            echo " 
                    <td>.$Username.</td>
                    <td>.$FullName.</td>
                    <td>.$Classfication.</td>
                    <td>.$Address.</td>
                    <td>.$Email.</td>
                    <td>.$Mobile.</td>
                    <td>.$Salary.</td>
                    <td>.<img class='img-thumbnail' src='$imgefile' alt='$imgefile'>.</td>
                    <td>.$Qulification.</td>
                    <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                        <button type='button' class='btn btn-danger' id='deleted'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        <button type='button' class='btn btn-warning' id='editd'><i class='fa-solid fa-pen'></i></button>
                    </div>
                    </td>";
        }
        else{
            echo false;
        }
    }
    else if($action=="updatedoctor"){
        $updateid=$_POST['updateid'];
        $searchbyidsql="SELECT `doctor`.`Doctorid` AS `DoctorId`, `user`.`UserName` AS `DoctorName`, `user`.`Gender` AS `Gender`, `user`.`DateOfBirth` AS `DOB`,`user`.`Password` AS `Password`, `user`.`Mobileno` AS `Mobilno`, `user`.`Email` AS `Email`, `user`.`NIC` AS `NIC`, `doctor`.`classification` AS `Classfication`,  `doctor`.`Image` AS `DoctorImage`, `user`.`FullName` AS `FullName`,`user`.`Address` AS `Address`,`doctor`.`qulification` AS `Qulification`, `doctor`.`Price` AS `Price`
        FROM `doctor` 
        LEFT JOIN `user` ON `doctor`.`Doctorid` = `user`.`UserID` WHERE UserID='$updateid' ;";
        $rowsearch=$Ayushconnect->query($searchbyidsql);
        $sersltpu='';
        while($row=mysqli_fetch_assoc($rowsearch)){
            $sersltpu.=$row['DoctorId'].'_';
            $sersltpu.=$row['DoctorName'].'_';
            $sersltpu.=$row['Gender'].'_';
            $sersltpu.=$row['DOB'].'_';
            $sersltpu.=$row['Mobilno'].'_';
            $sersltpu.=$row['Email'].'_';
            $sersltpu.=$row['NIC'].'_';
            $sersltpu.=$row['Classfication'].'_';
            $sersltpu.=$row['FullName'].'_';
            $sersltpu.=$row['DoctorImage'].'_';
            $sersltpu.=$row['Price'].'_';
            $sersltpu.=$row['Qulification'].'_';
            $sersltpu.=$row['Address'].'_';
            $sersltpu.=$row['Password'];
        }
        echo $sersltpu;
    }
    else if ($action=="delete"){
        $Deletestatus=$_POST['table'];
        $UserID=$_POST['Doctorid'];
        $DeleteDoctor="DELETE FROM `doctor` WHERE `Doctorid`='$UserID'";
        $DeleteUser="DELETE FROM `user` WHERE `UserID`='$UserID'";
        if($Deletestatus=="OK"){
            if($Ayushconnect->query($DeleteDoctor)){
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
            if($Ayushconnect->query($DeleteDoctor)){
                echo true;
            }
            else{
                echo false;
            }

        }
       
    }
    else if($action=="DoctorCate"){
        $sqldoctorcat="SELECT COUNT(`Doctorid`) as Doctorscount, `classification` FROM `doctor` GROUP BY `classification`;";
       $dcatres=$Ayushconnect->query($sqldoctorcat);
       $dcount='';
       while($dcatrow=mysqli_fetch_object($dcatres)){
        $dcount.="<tr><td style='width:60%'>{$dcatrow->classification}</td><td style='width:40%'>{$dcatrow-> Doctorscount}</td></tr>";
       }
       echo $dcount;
    }

?>