<?php 
 include("Conf.php");
 if(isset($_POST['register'])){
    $fullname=$_POST['fullname'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $dob=$_POST['dob'];
    $Gender=$_POST['Gender'];
    $address=$_POST['address'];
    $UserName=$_POST['UserName'];
    $password=$_POST['password'];
    $nationalid=$_POST['nationalid'];

    $stmt=$Ayushconnect->query("INSERT INTO `user`(`UserName`, `Password`, `FullName`, `Gender`, `DateOfBirth`, `Mobileno`, `Email`, `NIC`) VALUES ('$UserName','$password','$fullname','$Gender','$dob','$mobile','$email','$nationalid')");
    header(`Location:Login.php?regms='<span id="registion" class="text-succuss text-center">Registration is Succfully</span>'`);
 }
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="/vendors/formvalidation/dist/css/formValidation.min.css" />
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
<main class='container d-flex justify-content-center align-item-center'>
    <div class="w-75 min-vh-100 position-relative Registration py-5">
        <div class="col-md-10 mx-auto mt-5">
            <img class="rounded-circle" src="img/logo.png" alt="logo">
            <h1 class="text-center">Register</h1>
<!---------------------------------------------Form--------------------------------------------------------------------->
            <form action="" method="POST" autocomplete="off" novalidate id="userRegistration">

                <div class="row my-3">
                    <div class="formgroup col-12">
                        <lable for="fullname" class="form-label">FullName</lable>
                        <input type="text" name="fullname" id="fullname" class="form-control" required>
                        <div class="invalid-feedback">Fullname is medatory</div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="form-group col-md-12">
                        <label for="Address" class="form-label">Address</label>
                        <input type="text" name="address" id="Address" class="form-control" required>
                        <div class="invalid-feedback">Address is mendatory</div>
                    </div>
                </div>

                <div class="row  my-3">
                    <div class="formgroup col-md-6">
                        <lable for="email" class="form-label">Email</lable>
                        <input type="email" name="email" id="email" class="form-control" required>
                        <div class="invalid-feedback">Email is mendatory</div>
                    </div>
                    <div class="formgroup col-md-6">
                        <lable class="form-label" for="mobile">Mobile</lable>
                        <input type="tel" name="mobile" id="mobile" class="form-control" required>
                        <div class="invalid-feedback">Mobile is mendatory</div>
                    </div>
                </div>

                <div class="row my-3">
                    <div class="form-group col-md-6">
                        <label for="" class="form-label">NIC</label>
                        <input type="text" name="nationalid" id="nationalid" class="form-control" required>
                        <div class="invalid-feedback">NIC No is mendatory</div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="bloodgroup" class="form-label">UserName</label>
                        <input type="text" name="UserName" id="username" class="form-control" list="username">
                    </div>
                </div>

                <div class="row my-3">
                    <div class="form-group col-md-6">
                        <lable class="form-label" for="password">New Password</lable>
                        <input type="password" name="password" id="newPassword" class="form-control" required>
                        <div class="invalid-feedback">Password is mendatory</div>
                    </div>
                    <div class="form-group col-md-6">
                        <lable class="form-label">Re Password</lable>
                        <input type="password" name="confPassword" id="confpassword" class="form-control">
                    </div>
                </div>
                <div class="row  my-3">
                    <div class="formgroup col-md-6">
                        <lable class="form-label" for="dob">Date of Birth</lable>
                        <input type="date" name="dob" id="dob" class="form-control cursor-text" required>
                        <div class="invalid-feedback">Date of Birth is mendatory</div>
                    </div>
                    <div class="formgroup col-md-6 py-4 mt-1 cursor-pointer">
                        <label class="form-label" for="Gender pr-2">Gender</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="Gender" id="Male" value="Male">
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input " type="radio" name="Gender" id="Female" value="Female">
                            <label class="form-check-label" for="Female">Female</label>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="form-check col-12 ml-3">
                        <input type="checkbox" class="form-check-input" id="conditions" required>
                        <div class="invalid-feedback">Must selection</div>
                        <label class="form-check-label" for="condition">Agree terms and <span id="condition" class="text-muted">Conditions</span></label>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="w-50 d-flex justify-content-between mx-auto cursor-pointer ">
                        <button class="btn btn-primary" type="submit" name="register">SignUp</button>
                        <button class="btn btn-danger" id="reset" type="reset">Clear</button>
                    </div>
                </div>
              
            </form>
        </div>
        
    </div>
</main>
<?php require('Footer.php');?>
<script src="JS/jquery-validation/dist/jquery.validate.js"></script>
<script src="JS/loginsystem.js"></script>
</body>
</html>