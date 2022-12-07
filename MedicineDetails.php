<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $MedicineShowsql="SELECT * FROM `medicine`";
    $medicineResult=$Ayushconnect->query($MedicineShowsql);
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
                <span class="navbar-brand">Medicine details</span>
                <button id="Add_items" class="ml-auto btn btn-success btn-sm">Add Medicine</button>
                </div>
                <table id='medicinedetails'class="table mt-3 table-striped table-inverse table-responsive">
                    <thead class="thead-inverse text-center">
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>IncludeItems</th>
                            <th>Manifucture Date</th>
                            <th>Expried Date</th>
                            <th>Price</th>
                            <th>Category</th>
                            <th>Volume</th>
                            <th>Operation</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                                while($medcineRow=mysqli_fetch_assoc($medicineResult)){ ?> 
                             <tr id="<?php echo $medcineRow['Medicinecode']; ?>">
                                <td><?php echo $medcineRow['MedicineName']; ?></td>
                                <td><img class="img-thumbnail" src="<?php echo $medcineRow['image']; ?>" alt="<?php echo $medcineRow['image']; ?>"></td>
                                <td><?php echo $medcineRow['Include']; ?></td>
                                <td><?php echo $medcineRow['ManuFactureDate']; ?></td>
                                <td><?php echo $medcineRow['ExprieidDate']; ?></td>
                                <td><?php echo $medcineRow['Price']; ?></td>
                                <td><?php echo $medcineRow['Category']; ?></td>
                                <td><?php echo $medcineRow['volume']; ?></td>
                                <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <button type="button" class="btn btn-danger" id="delete"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                    <button type="button" class="btn btn-warning" id="edit"><i class="fa-solid fa-pen"></i></button>
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
     <div class="modal fade" tabindex="-1" role="dialog" id="AddMedicine">
        <div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Medicines</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modelcontents">
                    <form action="" method="post" id="AddMedicineForm"  enctype="multipart/form-data" autocomplete="off">
                        <input type="hidden" name="action" id="action" value="insert">
                        <input type="hidden" name="idinify" id="idinify" value="" >
                        <div class="moddelveiw">
                        <div class="row my-2 mx-auto d-flex justify-content-md-center">
                                    <img class="img-thumbnail mimg w-100" src="">
                        </div>
                        <div>
                            <div class="row my-2 mx-auto d-flex justify-content-md-between">
                                <div class="form-group Mid col">
                                    <label for="MedicineCode">MedicineCode</label>
                                    <input id="MedicineCode" class="form-control" type="text" name="MedicineCode" required>
                                </div>
                                <div class="form-group col">
                                    <label for="MedicineName">MedicineName</label>
                                    <input id="MedicineName" class="form-control" type="text" name="MedicineName" required>
                                </div>
                            </div>
                            <div class="row my-2 mx-auto d-flex justify-content-md-between">
                                <div class="form-outline col">
                                    <label class="form-label" for="textAreaExample3">includeitems</label>
                                    <textarea class="form-control" id="includeitems" name="includeitems" rows="2"></textarea>
                                    
                                </div>
                                <div class="form-group col">
                                    <label for="Category">Category</label>
                                    <select class="custom-select" name="Category" id="Category" required>
                                        <option selected>Select Category</option>
    
                                    </select>
                                </div>
                            </div>
                            <div class="row my-2 mx-auto d-flex justify-content-md-between">
                                <div class="form-group col">
                                    <label for="ManifuctureDate">Manif Date</label>
                                    <input id="ManifuctureDate" class="form-control" type="date" name="ManifuctureDate">
                                </div>
                                <div class="form-group col">
                                    <label for="ExpriedDate">Ex Date</label>
                                    <input id="ExpriedDate" class="form-control" type="date" name="ExpriedDate" required>
                                </div>
                            </div>
                            <div class="row my-2 mx-auto d-flex justify-content-md-between">
                                <div class="form-group col">
                                    <label for="Price">Price</label>
                                    <input id="Price" class="form-control" type="text" name="Price">
                                </div>
                                <div class="form-group col">
                                    <label for="Volume">volume</label>
                                    <input id="Volume" class="form-control" type="Volume" name="Volume" required>
                                </div>
                                <div class="form-group col">
                                    <label for="image">MedicineImage</label>
                                    <input id="imagemed" class="form-control btn btn-secoundry popover-test" type="file" title="medcine image" name="imagemed">
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-sm" id="save" name="save" >Save</button>
                            <button type="reset" class="btn btn-danger btn-sm" id="reset" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   
<?php require('Footer.php');?>
<script src="JS/Pesonal.js"></script>
<script src="JS/Admin.js"></script>
</body>
</html>