<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $DoctorShowsql="SELECT `doctor`.`Doctorid` AS `DoctorId`, `user`.`UserName` AS `DoctorName`, `user`.`Gender` AS `Gender`, `user`.`Password` AS `Password`, `user`.`Mobileno` AS `Mobilno`, `user`.`Email` AS `Email`, `user`.`NIC` AS `NIC`, `doctor`.`classification` AS `Classfication`,  `doctor`.`Image` AS `DoctorImage`, `user`.`FullName` AS `FullName`,`user`.`Address` AS `Address`,`doctor`.`qulification` AS `Qulification`, `doctor`.`Price` AS `Price`
    FROM `doctor` 
	LEFT JOIN `user` ON `doctor`.`Doctorid` = `user`.`UserID`;";
    $DoctorResult=$Ayushconnect->query($DoctorShowsql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
    <div class="pages">
        <aside class='bg-secondary d-flex justify-content-center ' id="sidebar">
            <ul class="nav text-center text-capitalize  d-flex flex-column align-items-center"></ul>
        </aside>
        <main  id="Content">
            <div class="container">
                <div class='d-flex flex-row shadow'>
                <span class="navbar-brand">Doctor details</span>
                <button id="Add_Doctor" class="ml-auto btn btn-success btn-sm">Add Doctor</button>
                </div>
                <table id='#Doctordetails' class="table mt-3 table-striped table-inverse table-responsive w-100">
                    <thead class="thead-inverse text-center">
                        <tr>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Salary</th>
                            <th>DoctorImage</th>
                            <th>Qulification</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($DoctorRow=mysqli_fetch_assoc($DoctorResult)){ ?> 
                             <tr id="<?php echo $DoctorRow['DoctorId']; ?>">
                                <td><?php echo $DoctorRow['DoctorName']; ?></td>
                                <td><?php echo $DoctorRow['FullName']; ?></td>
                                <td><?php echo $DoctorRow['Classfication']; ?></td>
                                <td><?php echo $DoctorRow['Address']; ?></td>
                                <td><?php echo $DoctorRow['Email']; ?></td>
                                <td><?php echo $DoctorRow['Mobilno']; ?></td>
                                <td><?php echo $DoctorRow['Price']; ?></td>
                                <td><img class="img-thumbnail" src="<?php echo $DoctorRow['DoctorImage']; ?>" alt="<?php echo $DoctorRow['DoctorImage']; ?>"></td>
                                <td><?php echo $DoctorRow['Qulification']; ?></td>
                                
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-danger" id="deleted"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-warning" id="editd"><i class="fa-solid fa-pen"></i></button>
                                </div>
                                </td>
                            </tr>
                                <?php } ?>
                            
                            
                        </tbody>
                </table>
            </div>
        </main>
   
    </div>
     <!-- model for add details -->
     <div class="modal fade" tabindex="-1" role="dialog" id="AddDoctor">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post" id="AddDoctorForm"  enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="actiond" id="actiond" value="insert">
                        <input type="hidden" name="idinifyd" id="idinifyd" value="" >
                       <div class="row">
                            <div class="form-group col">
                                <label for="Username">UserName</label>
                                <input class="form-control" type="text" id='Username' name="Username">
                            </div>
                            <div class="form-group col">
                                <label for="FullName">FullName</label>
                                <input id="FullName" class="form-control" type="text" id='FullName' name="FullName">
                            </div>
                       </div>
                       <div class="row">
                             <div class="form-group col">
                                <label for="Email">Email</label>
                                <input id="Email" class="form-control" type="email" name="Email">
                             </div>
                             <div class="form-group col">
                                <label for="Mobile">Mobile</label>
                                <input id="Mobile" class="form-control" type="tel" name="Mobile">
                             </div>
                       </div>
                       <div class="row">
                            <div class="form-group col">
                                <label for="DOB">DOB</label>
                                <input id="DOB" class="form-control" type="date" name="DOB">
                            </div>
                            <div class="form-group col">
                                <label for="NIC">NIC</label>
                                <input id="NIC" class="form-control" type="text" name="NIC" required>
                            </div>
                       </div>
                       <div class="row">
                                <div class="form-group col">
                                  <label for="Classfication">Classfication</label>
                                  <select class="form-control form-control-sm" name="Classfication" id="Classfication">
                                    <option value="OPT">OPT</option>
                                    <option value="Nero">Nero</option>
                                    <option value="Sergen">Sergen</option>
                                    <option value="Bouns">Bouns</option>
                                    <option value="Skin">Skin</option>
                                    <option value="Sycology">Sycology</option>
                                    <option value="Brain">Brain</option>
                                  </select>
                                </div>
                                <div class="form-group col mt-4">
                                    <label for="Gender">Gender</label>
                                    <div class="form-check form-check-inline px-2">
                                        <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male">
                                        <label class="form-check-label" for="Male">Male</label>
                                    </div>
                                    <div class="form-check form-check-inline px-2">
                                        <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female">
                                        <label class="form-check-label" for="Female">Femal</label>
                                    </div>
                                </div>   
                       </div>
                       <div class="row">
                                <div class="form-group col">
                                    <label for="Address">Address</label>
                                    <textarea id="Address" class="form-control" name="Address" rows="3"></textarea>
                                </div>
                                <div class="form-group col">
                                    <label for="Qulification">Qulification</label>
                                    <textarea id="Qulification" class="form-control" name="Qulification" rows="3"></textarea>
                                </div>
                       </div>
                       <div class="row Optional2">
                                    <div class="form-group col">
                                        <label for="Height">DoctorImage</label>
                                        <input id="DoctorImage" class="form-control btn" type="file" name="DoctorImage">
                                    </div>
                                    <div class="form-group col">
                                        <label for="Salary">Salary</label>
                                        <input id="Salary" class="form-control" type="number" step="0.01" name="Salary">
                                    </div>
                       </div>
                       <div class="row Optional">
                            <div class="form-group col mt-4">
                                    <label for="PaidStatus">PaidStatus</label>
                                    <div class="form-check form-check-inline px-2">
                                        <input class="form-check-input" type="radio" name="PaidStatus" id="PaidStatus" value="Paid">
                                        <label class="form-check-label" for="Paid">Paid</label>
                                    </div>
                                    <div class="form-check form-check-inline px-2">
                                        <input class="form-check-input" type="radio" name="PaidStatus" id="PaidStatus" value="UnPaid">
                                        <label class="form-check-label" for="UnPaid">UnPaid</label>
                                    </div>
                                    <div class="form-check form-check-inline px-2">
                                        <input class="form-check-input" type="radio" name="PaidStatus" id="PaidStatus" value="Expried">
                                        <label class="form-check-label" for="Expreied">Expreid</label>
                                    </div>
                            </div>
                            <div class="form-group col">
                                <label for="Password">Password</label>
                                <input id="Password" class="form-control" type="text" name="Password">
                            </div>        
                       </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="saved" name="savep" >Save</button>
                    <button type="reset" class="btn btn-danger btn-sm" id="resetd" data-dismiss="modal">Close</button>
                </div>
                    </from>
                </div>
            </div>
        </div>
    </div>
   
<?php require('Footer.php');?>
<script src="JS/Pesonal.js"></script>
<script src="JS/Admin.js"></script>
</body>
</html>