<?php 
session_start();
include("Conf.php");
$action=$_POST['action'];
    if($action=='insert'){
        $MedicineCode=$_POST['MedicineCode'];
        $MedicineName=$_POST['MedicineName'];
        $includeitems=$_POST['includeitems'];
        $Category=$_POST['Category'];
        $ManifuctureDate=$_POST['ManifuctureDate'];
        $ExpriedDate=$_POST['ExpriedDate'];
        $Price=$_POST['Price'];
        $Volume=$_POST['Volume'];
        // file upload
        $pname=rand(1000,20000)."-".$_FILES["imagemed"]["name"];
        $temname=$_FILES["imagemed"]["tmp_name"];
        $upload_dirmed='img\uploads\medicine';
        move_uploaded_file($temname,$upload_dirmed.'/'.$pname);
        $imgefile= "img/uploads/medicine/". $pname;
        $insertmedicine="INSERT INTO `medicine` (`Medicinecode`, `MedicineName`, `Include`, `ManuFactureDate`, `ExprieidDate`, `Price`, `Category`, `image`, `volume`) VALUES ('$MedicineCode','$MedicineName','$includeitems','$ManifuctureDate','$ExpriedDate','$Price','$Category','$imgefile','$Volume')";
        if($Ayushconnect->query($insertmedicine)){
                    echo "   <tr id='$MedicineCode'>
                    <td>.$MedicineName.</td>
                    <td><img class='img-thumbnail' src='$imgefile' alt='$imgefile'></td>
                    <td>.$includeitems.</td>
                    <td>.$ManifuctureDate.</td>
                    <td>.$ExpriedDate.</td>
                    <td>.$Price.</td>
                    <td>.$Category.</td>
                    <td>.$Volume.mg</td>
                    <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                        <button type='button' class='btn btn-danger' id='delete'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        <button type='button' class='btn btn-warning' id='edit'><i class='fa-solid fa-pen'></i></button>
                    </div>
                    </td>
                </tr>";
        }
        else{
            echo false;
        }
    }
    else if ($action=="update") {
        $MedicineCode=$_POST['MedicineCode'];
        $MedicineName=$_POST['MedicineName'];
        $includeitems=$_POST['includeitems'];
        $Category=$_POST['Category'];
        $ManifuctureDate=$_POST['ManifuctureDate'];
        $ExpriedDate=$_POST['ExpriedDate'];
        $Price=$_POST['Price'];
        $Volume=$_POST['Volume'];
         // file upload
         $pname=rand(1000,20000)."-".$_FILES["imagemed"]["name"];
         $temname=$_FILES["imagemed"]["tmp_name"];
         $upload_dirmed='img\uploads\medicine';
         move_uploaded_file($temname,$upload_dirmed.'/'.$pname);
         $imgefile= "img/uploads/medicine/". $pname;
        $updatemedicine="UPDATE `medicine` SET `MedicineName`='$MedicineName', `Include`='$includeitems', `ManuFactureDate`='$ManifuctureDate', `ExprieidDate`='$ExpriedDate', `Price`='$Price', `Category`='$Category', `image`='$imgefile', `volume`='$Volume' WHERE `Medicinecode`='$MedicineCode'";
        if($Ayushconnect->query($updatemedicine)){
                    echo "
                    <td>.$MedicineName.</td>
                    <td><img class='img-thumbnail' src='$imgefile' alt='$imgefile'></td>
                    <td>.$includeitems.</td>
                    <td>.$ManifuctureDate.</td>
                    <td>.$ExpriedDate.</td>
                    <td>.$Price.</td>
                    <td>.$Category.</td>
                    <td>.$Volume.mg</td>
                    <td>
                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                        <button type='button' class='btn btn-danger' id='delete'><i class='fa fa-trash' aria-hidden='true'></i></button>
                        <button type='button' class='btn btn-warning' id='edit'><i class='fa-solid fa-pen'></i></button>
                    </div>
                    </td>";
        }
        else{
            echo false;
        }
    }
    else if ($action=="delete"){
        $MedicineCode=$_POST['MedicineCode'];
        $Deletemedicine="DELETE FROM `medicine` WHERE `Medicinecode`='$MedicineCode'";
        if($Ayushconnect->query($Deletemedicine)){
            echo true;
        }
        else{
            echo false;
        }
    }
    else if($action=="show"){
        $Categorysql="SELECT DISTINCT `Category` FROM `medicine`";
        $Categoryresultset=$Ayushconnect->query($Categorysql);
        while($crow=mysqli_fetch_assoc($Categoryresultset)){
            $cat=$crow['Category'];
            echo "<div class='row border-bottom'><span class='navbar-brand my-4 text-capitalize h3'>$cat</span></div><div class='Scrollcontainer'>";
            $MedicneItemssql="SELECT * FROM `medicine` WHERE `Category` = '$cat'";
            $Medicineresult=$Ayushconnect->query($MedicneItemssql);
            while($prow=mysqli_fetch_assoc($Medicineresult)){ ?>
                    <div class='card col-md-3 m-4 shadow rounded'>
                        <img src='<?php echo $prow['image'];?>' width='200px' height='200px' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title text-center'><?php echo $prow['MedicineName'];?></h5>
                            <p class='card-text text-justify'><b>Price:</b><?php echo $prow['Price'];?></p>
                            <a href='#oneProduct' class='btn btn-primary btn-sm px-2 seemore' id='<?php echo $prow['Medicinecode'];?>'>SeeMore</a>
                        </div>
                    </div>

            <?php }
            echo "</div>";
        }
        
    }
    else if($action=="oneshow"){
        $id=$_POST['id'];
        $oneprosql="SELECT * FROM `medicine` WHERE `Medicinecode` = '$id' ";
        $oneprores=$Ayushconnect->query($oneprosql);
        while($op=mysqli_fetch_object( $oneprores)){ 
            ?>
        <div class="card" id="seeitems">
        <div class="card-header">Medicine</div>
        <div class="card-body d-flex align-items-center">
            <div><img class="img-thumbnail" src="<?php echo $op->image;?>" width="400px" height="400px" alt=""></div>
            <div class="text-center mx-auto"> 
            <h5 class="card-title h3"><?php echo $op->MedicineName;?></h5>
            <p class="card-text"><b>Price: </b><?php echo $op->Price;?>Rs<br/><b>includes: </b><?php echo $op->Include;?></p>
            <a href="Buy.php?'<?php echo(http_build_query($op)); ?>'" class="btn btn-primary">Buy</a>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted text-center">
            <p><i>useFor : </i><?php echo $op->uses;?></p> 
        </div>
  </div>
  <?php }
    }
    else if($action=="search"){
            $search=$_POST['search'];
            $MedicneItemssql="SELECT * FROM `medicine` WHERE `Category` LIKE '$search%' OR `Medicinecode` LIKE '$search%' OR `MedicineName` LIKE '$search%'";
            $Medicineresult=$Ayushconnect->query($MedicneItemssql);
            while($prow=mysqli_fetch_assoc($Medicineresult)){ ?>
                    <div class='card col-md-3 m-4 shadow rounded'>
                        <img src='<?php echo $prow['image'];?>' width='200px' height='200px' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title text-center'><?php echo $prow['MedicineName'];?></h5>
                            <p class='card-text text-justify'><b>Price:</b><?php echo $prow['Price'];?></p>
                            <a href='#oneProduct' class='btn btn-primary btn-sm px-2 seemore' id='<?php echo $prow['Medicinecode'];?>'>SeeMore</a>
                        </div>
                    </div>


            <?php }
        
    }
    else if($action=="MedicineCate"){
        $sqlmedcat="SELECT COUNT(`Medicinecode`) as cat, `Category` FROM `medicine` GROUP BY `Category`;";
        $mcatres=$Ayushconnect->query( $sqlmedcat);
        $mcount='';
        while($mcatrow=mysqli_fetch_object($mcatres)){
         $mcount.="<tr><td style='width:60%'>{$mcatrow->Category}</td><td style='width:40%'>{$mcatrow->  cat}</td></tr>";
        }
        echo $mcount;
    }
    else if($action=="buy"){
        $medicalcode=$_POST['medid'];
        $numofItems=$_POST['count'];
        $Price=$_POST['onePrice'];
        $Total=$numofItems*$Price;
        $insertsql="INSERT INTO `tabletesbuy` ( `Medicinecode`, `numberofitem`, `Total`) VALUES ( '$medicalcode', '$numofItems', '$Total');";
        if($Ayushconnect->query($insertsql)){
            echo "ok";
            
        }
    }
?>