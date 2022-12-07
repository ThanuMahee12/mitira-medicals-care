<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $Disesessql="SELECT * FROM `diseses`";
    $DisesesResult=$Ayushconnect->query($Disesessql);
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
        <aside class='bg-secondary d-flex justify-content-center' id="sidebar">
            <ul class="nav text-center text-capitalize  d-flex flex-column align-items-center"></ul>
        </aside>
        <main id="Content">
            <div class="container">
                <div class='d-flex flex-row shadow'>
                <span class="navbar-brand">Diseses details</span>
                <button id="Add_Diseses" class="ml-auto btn btn-success btn-sm">Add Diseses</button>
                </div>
                <table id='Desesdetails' class="table mt-3 table-striped table-inverse table-responsive w-100">
                    <thead class="thead-inverse text-center">
                        <tr>
                            <th>DisesesName</th>
                            <th>Treatments</th>
                            <th>Category</th>
                            <th>SeriousSymtoms</th>
                            <th>Symbtoms</th>
                            <th>Medicines</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($DisesesRow=mysqli_fetch_assoc($DisesesResult)){ ?> 
                             <tr id="<?php echo $DisesesRow['Disescode']; ?>">
                                <td><?php echo $DisesesRow['DisesName']; ?></td>
                                <td><?php echo $DisesesRow['Treatments']; ?></td>
                                <td><?php echo $DisesesRow['Category']; ?></td>
                                <td><?php echo $DisesesRow['SeriosSymbtoms']; ?></td>
                                <td><?php echo $DisesesRow['Symbtoms']; ?></td>
                                <td><?php echo $DisesesRow['Medicine']; ?></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-danger" id="deletedes"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-warning" id="editdes"><i class="fa-solid fa-pen"></i></button>
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
     <div class="modal fade" tabindex="-1" role="dialog" id="AddDiseses">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Diseses</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body ">
                    <form action="" method="post" id="AddDisesesForm"  enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="actiondes" id="actiondes" value="insert">
                        <input type="hidden" name="idinifydes" id="idinifydes" value="" >
                       <div class="row">
                            <div class="form-group col">
                                <label for="DisesesCode">DisesesCode</label>
                                <input class="form-control" type="text" id='DisesesCode' name="DisesesCode">
                            </div>
                            <div class="form-group col">
                                <label for="DisesesName">DisesesName</label>
                                <input id="DisesesName" class="form-control" type="text" id='DisesesName' name="DisesesName">
                            </div>
                       </div>
                       <div class="row">
                             <div class="form-group col">
                                <label for="Treatments">Treatments</label>
                                <textarea id="Treatments" class="form-control" row="3" name="Treatments"></textarea>
                             </div>
                             <div class="form-group col">
                                <label for="Medicines">Medicines</label>
                                <textarea id="Medicines" class="form-control"  name="Medicines" row="3"></textarea>
                             </div>
                       </div>
                       <div class="row">
                            <div class="form-group col-8">
                                <label for="Imageurl">Imageurl</label>
                                <texarea id="Images" class="form-control" name="Images" row="1"></texarea>
                            </div>
                            <div class="form-group col-4">
                            <label for="Imageurl">Image</label>
                                <input id="Image" class="form-control" type="file" name="Image">
                            </div>
                       </div>
                       <div class="row">
                                <div class="form-group col">
                                  <label for="Category">Categoryies</label>
                                  <select class="form-control" name="Category" id="Category"></select>
                                </div> 
                       </div>
                       <div class="row">
                                <div class="form-group col">
                                    <label for="SeriousSymtoms">SeriousSymtoms</label>
                                    <textarea id="SeriousSymtoms" class="form-control" name="SeriousSymtoms" rows="3"></textarea>
                                </div>
                                <div class="form-group col">
                                    <label for="Symtoms">Symtoms</label>
                                    <textarea id="Symtoms" class="form-control" name="Symtoms" rows="3"></textarea>
                                </div>
                       </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" id="savedes" name="savedes" >Save</button>
                    <button type="reset" class="btn btn-danger btn-sm" id="resetdes" data-dismiss="modal">Close</button>
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