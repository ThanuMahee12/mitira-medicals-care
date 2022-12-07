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
    <main class="container">
    <div class="medicineheader d-flex shadow align-items-center">
    <a class="navbar-brand fw-bolder" href="#">Medicine</a>
        <form class="form-inline ml-auto" method="get" action="">
            <div class="input-group border border-primary">
                <input type="text" class="form-control" placeholder="Search" id="Search" aria-label="search here" aria-describedby="Searchmedcine">
                <div class="input-group-append btn-success">
                    <button class="btn btn-outline-light" type="button" id="Searchmedcine" name="Searchmedcine"><i class="fa fa-search" aria-hidden="true"></i></button>
            </div>
            </div> 
       </form>        
    </div>
    
    <div id='medicineContainer'>
             <!-- <div class="row"><span class="navbar-brand my-4">Cartogries</span>
</div> -->
                   
    </div>
    <div id="oneProduct" class="jumbotron">
        <div class="card" id="seeitems">
            <div class="card-header">Medicine</div>
            <div class="card-body d-flex align-items-center">
                <div><img class="img-thumbnail" src="img/logo.png" width="400px" height="400px" alt=""></div>
                <div class="text-center mx-auto"> 
                <h5 class="card-title h3">MedicineName</h5>
                <p class="card-text"><b>Price: </b>0000.00Rs<br/><b>includes: </b>items</p>
                <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
         
            </div>
            <div class="card-footer text-muted text-center">
                <p><i>useFor : </i>sikis</p> 
            </div>
      </div>
    </div>
    </main>
<?php require('Footer.php');?>
<script src="JS/Home.js"></script>
</body>
</html>