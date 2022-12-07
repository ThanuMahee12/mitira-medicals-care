<?php 
 require ('conf.php');
session_start();
if(!isset($_SESSION['UserID'])){
    header("location:Login.php?regms=Login First!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
    <main class="chenelling d-flex align-item-center">
        <form action="" method="post" id="chenelingform" class="chenelingform d-flex flex-column align-items-center shadow w-50" >
            <input type="hidden" name="actionChe" value="insertm">
            <div class="row chehead">
                <h1 class="text-primary text-center w-100">Chanelling</h1>
            </div>
            <div class="form-group w-50">
                <input id="UserId" class="form-control text-center" name="userid" type="text" value="<?php echo $_SESSION['UserID']; ?>" name="userid" placeholder="userid" readonly>
            </div>
            <div class="form-group w-50">
                <input id="nowdate" class="form-control text-center" type="text" value="<?php echo Date('d-m-y h:i');?>" name="nowdate" placeholder="nowdate" readonly>
            </div>
            <div class="form-group w-50">
                       <label for="Doctor" class="form-label">Doctor<a href="#doctorsdetails" class="link-primary">id</a></label>
                       <input
                         class="form-control"
                         list="Doctor"
                         id="Doctor"
                         placeholder="Doctorid"
                         name="Doctor"
                       />
                   </div>
                </div>
            <div class="form-group w-50">
                <textarea id="description" class="form-control text-center"  name="description" placeholder="description" row="2"></textarea>
            </div>
            <div class="form-group w-50">
              <label for="Type">Type</label>
              <select class="form-control" name="Type" id="Type">
                <option value="Manual">Manual</option>
                <option value="Online">Online</option>
              </select>
            </div>
            </div>
            
            <div id="actionformchanel" class="row w-50 d-flex justify-content-center">
                <input type="submit" class="btn btn-success btn fw-bold mx-4"value="submit" id="sibmit" name="submit">
                <input type="reset" class="btn btn btn-danger fw-bold mx-4" value="clear" id="clear" name="clear">
            </div>

        </form>
        
    </main>
    <section id="doctorsdetails" class='container my-4 mx-auto'>
        <?php 
        $drsql='SELECT `doctor`.`Doctorid` AS `DoctorID`, `user`.`UserName` AS `Name`, `doctor`.`classification` AS `Category`, `doctor`.`Image` AS `Pic`, `doctor`.`qulification` AS `Qulification`
        FROM `doctor` 
            LEFT JOIN `user` ON `doctor`.`Doctorid` = `user`.`UserID`;';
        $drres=$Ayushconnect->query($drsql);
        while($dr=mysqli_fetch_assoc($drres)){ ?>
        <div class="card mb-3 w-75 shadow mx-auto">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="<?php echo $dr['Pic']; ?>" class="img-fluid rounded-start" alt="<?php echo $dr['Pic']; ?>">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><span class="mr-2"><?php echo $dr['DoctorID']; ?></span><?php echo $dr['Name'];?></h5>
                    <h6></h6>
                    <p class="card-text"><?php echo $dr['Category'];?></p>
                    <a href="#" class="btn btn-info btn-sm Chanel" id="<?php echo $dr['DoctorID']; ?>">Chanel</a>
                </div>
                </div>
            </div>
        </div>
<?php }?>
    </section>
    <!-- payment -->
    <div class="modal" id="payment" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id='paymentdetails'>
                        <input type="hidden" name="actionChe" value="payment">
                        <div class="form-group col-12">
                            <label for="Holder Name">HolderName</label>
                            <input id="HolderName" class="form-control" type="text" name="HolderName" placeholder="M.Thanujan" required>
                        </div>
                        <div class="form-group col-12">
                            <label for="AccountNumber">HolderName</label>
                            <input id="AccountNumber" class="form-control" type="text" name="AccountNumber" placeholder="0000 0000 0000 0000" required>
                        </div>
                        <div class="row">
                        <div class="form-group col-6">
                            <label for="Expried">HolderName</label>
                            <input id="Expried" class="form-control" type="text" name="Expried" placeholder="00/00" required>
                        </div>
                        <div class="form-group col-6">
                            <label for="CVS">CVS</label>
                            <input id="CVS" class="form-control" type="text" name="CVS" placeholder="000" required>
                        </div>
                        </div>
                       
                   
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="pay" id="pay" class="btn btn-primary">Pay</button>
                </div>
                </form>
            </div>
        </div>
    </div>
<?php require('Footer.php');?>
<script src="JS/Pesonal.js"></script>
</body>
</html>