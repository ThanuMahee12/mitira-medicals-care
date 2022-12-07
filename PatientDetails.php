<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $PaientShowsql="SELECT `paient`.`PaientId` AS `PaientId`, `user`.`UserName` AS `PaientName`, `user`.`Gender` AS `Gender`, `user`.`DateOfBirth` AS `DOB`, `user`.`Password` AS `Password`, `user`.`Mobileno` AS `Mobilno`, `user`.`Email` AS `Email`, `user`.`NIC` AS `NIC`, `paient`.`BloodGroup` AS `BloodGroup`, `paient`.`PaidSatus` AS `Paid`, `user`.`FullName` AS `FullName`,`user`.`Address` AS `Address`
    FROM `paient` 
        LEFT JOIN `user` ON `paient`.`PaientId` = `user`.`UserID`;";
    $PaientResult=$Ayushconnect->query($PaientShowsql);
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
        <aside class=' bg-secondary d-flex justify-content-center ' id="sidebar">
            <ul class="nav text-center text-capitalize  d-flex flex-column align-items-center"></ul>
        </aside>
        <main id="Content">
            <div class="container">
                <div class='d-flex flex-row shadow'>
                <span class="navbar-brand">User details</span>
                <button id="Add_Paitents" class="ml-auto btn btn-success btn-sm">Add Paitents</button>
                </div>
                <table id='paientdetails' class="table mt-3 table-striped table-inverse table-responsive w-100">
                    <thead class="thead-inverse text-center">
                        <tr>
                            <th>UserName</th>
                            <th>Name</th>
                            <th>DOB</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>Gender</th>
                            <th>BGroup</th>
                            <th>Paid</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($PaientRow=mysqli_fetch_assoc($PaientResult)){ ?> 
                             <tr id="<?php echo $PaientRow['PaientId']; ?>">
                                <td><?php echo $PaientRow['PaientName']; ?></td>
                                <td><?php echo $PaientRow['FullName']; ?></td>
                                <td><?php echo $PaientRow['DOB']; ?></td>
                                <td><?php echo $PaientRow['Address']; ?></td>
                                <td><?php echo $PaientRow['Email']; ?></td>
                                <td><?php echo $PaientRow['Mobilno']; ?></td>
                                <td><?php echo $PaientRow['Gender']; ?></td>
                                <td><?php echo $PaientRow['BloodGroup']; ?></td>
                                <td><?php echo $PaientRow['Paid']; ?></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-danger" id="deletep"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-warning" id="editp"><i class="fa-solid fa-pen"></i></button>
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
     <div class="modal fade" tabindex="-1" role="dialog" id="AddPaients">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Paients</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post" id="AddPaientForm"  enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="actionp" id="actionp" value="insert">
                        <input type="hidden" name="idinifyp" id="idinifyp" value="" >
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
                                  <label for="BloodGroup">BloodGroup</label>
                                  <select class="form-control form-control-sm" name="BloodGroup" id="BloodGroup">
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="C+">C+</option>
                                    <option value="C-">C-</option>
                                    <option value="AB+">AB+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
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
                                    <label for="Address">Special</label>
                                    <textarea id="Special" class="form-control" name="Special" rows="3"></textarea>
                                </div>
                       </div>
                       <div class="row Optional2">
                                    <div class="form-group col">
                                        <label for="Height">Height</label>
                                        <input id="Height" class="form-control" type="number" step="0.01" name="Height">
                                    </div>
                                    <div class="form-group col">
                                        <label for="Weight">Weight</label>
                                        <input id="Weight" class="form-control" type="number" step="0.01" name="Weight">
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
                    <button type="submit" class="btn btn-primary btn-sm" id="savep" name="savep" >Save</button>
                    <button type="reset" class="btn btn-danger btn-sm" id="resetp" data-dismiss="modal">Close</button>
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