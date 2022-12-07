<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
<main class='container d-flex justify-content-center align-item-center '>
    <div class="w-75  position-relative login">
        <div class="col-md-10 mx-auto mt-md-5">
            <img class="rounded-circle" src="img/logo.png" alt="logo">
            <h1 class="text-center text-dark h1">Log In</h1>
            <h4 class="text-center text-danger"><?php 
            if(isset($_GET['regms'])){
                echo $_GET['regms'];
            }
            ?></h4>
            <h6 class="text-danger" id="error"></h6>
            <form action="LoginSystem.php" method="POST" autocomplete="off" novalidate id="loginform">
                <div class="input-group mx-auto col-8 py-3 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" 
                    class="form-control" 
                    name="username" 
                    id="username" 
                    placeholder="username or email" 
                    aria-label="email" 
                    aria-describedby="username" 
                    required>
                    <div class="invalid-feedback">username or Email  is empty</div>
                </div>
            
                <div class="input-group mx-auto col-8 py-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-key" aria-hidden="true"></i></span>
                    </div>
                    <input type="password" 
                    class="form-control" 
                    name="password"
                    id="password" 
                    placeholder="password" 
                    aria-label="password" 
                    aria-describedby="password" 
                    required>
                    <div class="invalid-feedback">Password is empty</div>
                </div>
                <div class="d-flex flex-column justify-content align-items-center mt-3">
                <button name="login"class="btn btn-primary mx-auto" type="submit" id="login">Log In</button>
                <a href="#" class="link-primary mt-3" id='resetpass' >forget Password?</a>
                </div>
                
            </form>
        </div>
        
    </div>
</main>
<div class="modal" tabindex="-1" role="dialog" id="resetpassword">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Resetpassword</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="errorpass text-danger"></p>
        <form action="" method="post" id="resetpassword">
            <div class="form-group">
                <label for="Email">Email</label>
                <input id="Email" class="form-control" type="text" name="Email">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input id="Password" class="form-control" type="password" name="Password">
            </div>
            <div class="form-group">
                <label for="Confpassword">confpassword</label>
                <input id="Confpassword" class="form-control" type="password" name="confpassword">
            </div>
            <div class="form-group">
                <input id="submit" class="form-control btn-sm btn btn-info" type="reset" name="Submit">
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require('Footer.php');?>
<script src="JS/loginsystem.js"></script>
</body>
</html>