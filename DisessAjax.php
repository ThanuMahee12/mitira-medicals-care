<?php 
session_start();
include("Conf.php");
$action=$_POST['actiondes'];
    if($action=='insert'){
        $DisesesCode=$_POST['DisesesCode'];
        $DisesesName=$_POST['DisesesName'];
        $Treatments=$_POST['Treatments'];
        $Medicines=$_POST['Medicines'];
        $Imageurl=$_POST['Images'];
        $Category=$_POST['Category'];
        $SeriousSymtoms=$_POST['SeriousSymtoms'];
        $Symtoms=$_POST['Symtoms'];
        $insertDises="INSERT INTO `diseses`(`Disescode`, `DisesName`, `Symbtoms`, `SeriosSymbtoms`, `Treatments`, `Category`, `Image`, `Medicine`) VALUES ('$DisesesCode','$DisesesName','$Symtoms','$SeriousSymtoms','$Treatments','$Category','$Imageurl','$Medicines')";
        if($Ayushconnect->query($insertDises)){
            
                    echo " <tr id='$DisesesCode'>
                    <td>. $DisesesName.</td>
                    <td>.$Treatments.</td>
                    <td>.$Category.</td>
                    <td>.$SeriousSymtoms.</td>
                    <td>.$Symtoms.</td>
                    <td>.$Medicines.</td>
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
            <td id='$Special'>.$Email.</td>
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
       $id=$_POST['DisesesId'];
       if($Ayushconnect->query("DELETE FROM `diseses` WHERE `Disescode`='$id'")){
          echo 'ok';
       }
       
    }
    else if($action=="show"){
        $disesshow="SELECT * FROM `diseses` LIMIT 5";
        $res=$Ayushconnect->query($disesshow);
        while($row=mysqli_fetch_assoc($res)){ ?>
        <div class="jumbotron bg-light">
            <h1 class="display-4 h3"><b><?php echo $row['DisesName'];?></b></h1>
            <div class="row w-100 d-flex justify-content-between">
                <?php foreach (explode('____',$row['Image']) as $img) { ?>
                    
                <div class="col"><img width="100%" height="300px" src="<?php echo $img ?>" alt="<?php echo $img ?>"></div>
           <?php }?>
            </div>
            <div class="row text-center">
                <?php 
                    $Symbtoms=explode(',',$row['Symbtoms']);
                    $SerSymbtoms=explode(',',$row['SeriosSymbtoms']);
                    $treatment=explode(',,',$row['Treatments']);
                ?>
                <div class="col">
                    <h5 class="shadow">Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($Symbtoms as $symtom) { ?>
                        <li><?php echo $symtom; ?></li>
                    <?php } ?>
                   
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Serious Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($SerSymbtoms as $sser) { ?>
                        <li><?php echo $sser; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Treatments</h5>
                   <ul class="list-unstyled">
                   <?php foreach ($treatment as $tre) { ?>
                        <li><?php echo $tre; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
            </div>
        </div>
<?php 
        }
    }
     else if($action=="search"){
        $search =$_POST['search'];
        $disesshow="SELECT * FROM `diseses` WHERE `DisesName` LIKE '$search%' OR `Disescode` LIKE '$search%'";
        $res=$Ayushconnect->query($disesshow);
        while($row=mysqli_fetch_assoc($res)){ ?>
        <div class="jumbotron bg-info">
            <h1 class="display-4 h3"><?php echo $row['DisesName'];?></h1>
            <div class="row w-100 d-flex justify-content-between">
                <?php foreach (explode('____',$row['Image']) as $img) { ?>
                    
                <div class="col"><img width="100%" height="300px" src="<?php echo $img ?>" alt="<?php echo $img ?>"></div>
           <?php }?>
            </div>
            <div class="row text-center">
                <?php 
                    $Symbtoms=explode(',',$row['Symbtoms']);
                    $SerSymbtoms=explode(',',$row['SeriosSymbtoms']);
                    $treatment=explode(',,',$row['Treatments']);
                ?>
                <div class="col">
                    <h5 class="shadow">Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($Symbtoms as $symtom) { ?>
                        <li><?php echo $symtom; ?></li>
                    <?php } ?>
                   
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Serious Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($SerSymbtoms as $sser) { ?>
                        <li><?php echo $sser; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Treatments</h5>
                   <ul class="list-unstyled">
                   <?php foreach ($treatment as $tre) { ?>
                        <li><?php echo $tre; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
            </div>
        </div>
<?php 
        }
    }
    else if($action=="searchsyms"){
        $search =$_POST['search'];
        $disesshow="SELECT * FROM `diseses` WHERE `Symbtoms` LIKE '%$search%' OR `SeriosSymbtoms` LIKE '%$search%'";
        $res=$Ayushconnect->query($disesshow);
        while($row=mysqli_fetch_assoc($res)){ ?>
        <div class="jumbotron bg-info">
            <h1 class="display-4 h3"><?php echo $row['DisesName'];?></h1>
            <div class="row w-100 d-flex justify-content-between">
                <?php foreach (explode('____',$row['Image']) as $img) { ?>
                    
                <div class="col"><img width="100%" height="300px" src="<?php echo $img ?>" alt="<?php echo $img ?>"></div>
           <?php }?>
            </div>
            <div class="row text-center">
                <?php 
                    $Symbtoms=explode(',',$row['Symbtoms']);
                    $SerSymbtoms=explode(',',$row['SeriosSymbtoms']);
                    $treatment=explode(',,',$row['Treatments']);
                ?>
                <div class="col">
                    <h5 class="shadow">Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($Symbtoms as $symtom) { ?>
                        <li><?php echo $symtom; ?></li>
                    <?php } ?>
                   
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Serious Symbtoms</h5>
                   <ul class="list-unstyled">
                    <?php foreach ($SerSymbtoms as $sser) { ?>
                        <li><?php echo $sser; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
                <div class="col">
                    <h5 class="shadow">Treatments</h5>
                   <ul class="list-unstyled">
                   <?php foreach ($treatment as $tre) { ?>
                        <li><?php echo $tre; ?></li>
                  <?php  } ?>
                    
                   </ul>
                </div>
                <div class="row">
                    <button class="btn btn-primary">Get any solution</button>
                </div>
            </div>
        </div>
<?php 
        }
    }?>
    

