<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $id=$_SESSION['UserID'];
    $user="SELECT * FROM `user` WHERE `UserID`='$id'";
    $resultUser=$Ayushconnect->query($user);
    $row=mysqli_fetch_assoc($resultUser);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
    <div class="row">
    <aside class='col-md-2 bg-secondary mt-5 d-flex justify-content-center ' id="sidebar">
        <ul class="nav min-vh-100 text-center text-capitalize mt-4 d-flex flex-column align-items-center">    
        </ul>
    </aside>
    <main class='col-md-10 AdminDashBoard' id="Content">
        <section class="shadow-lg d-flex flex-row mx-auto" style="width:90%;border-radius:2cm">
        <div class="card">
            <img class="card-img" src="img/mydb.jpg" width="200px" height="300px" style="border-radius:10px">
            <div class="card-img-overlay">
                <h5 class="card-title text-center shadow fw-bold"><b><?php echo $_SESSION['UserName'];?></b></h5>
            </div>
        </div>
        <ul id="userdetails" class="align-self-md-center list-unstyled text-center mx-auto" style="font-size:18px;font-weight:900">
        <li class="py-1">Name:<?php echo $row['FullName']; ?></li>
            <li class="py-1">Email:<?php echo $row['Email']; ?></li>
            <li class="py-1">Mobile:<?php echo $row['Mobileno']; ?></li>
            <li class="py-1">Address:<?php echo $row['Address']; ?></li>
        </ul>
        </section>
        <section class="mt-5 shadow mx-auto"  style="width:90%;border-radius:2cm">
            <ul class="list-unstyled d-flex justify-content-between">
                <?php 
                    $dsql="SELECT * FROM `doctor`";
                    $dres=$Ayushconnect->query($dsql);
                ?>
                <li><div class="card">
                    <img class="card-img" src="img/doctor-removebg-preview.png" width="200px" height="200px" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-right h2"><span class="badge badge-pill badge-warning"><?php echo mysqli_num_rows($dres)?></span></h5>
                    </div>
                </div>
            </li>
                <li>
                <?php 
                    $msql="SELECT * FROM `medicine`";
                    $mres=$Ayushconnect->query($msql);
                ?>
                <div class="card">
                    <img class="card-img" src="img/2833228.png" width="200px" height="200px" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-right h2"><span class="badge badge-pill badge-info"><?php echo mysqli_num_rows($mres)?></span></h5>
                    </div>
                </div>
                </li>
                <li>
                <?php 
                    $psql="SELECT * FROM `paient`";
                    $pres=$Ayushconnect->query($dsql);
                ?>
                
                <div class="card">
                    <img class="card-img" src="img/2621983.png" width="200px" height="200px" alt="">
                    <div class="card-img-overlay">
                        <h5 class="card-title text-right h2"><span class="badge badge-pill badge-dark"><?php echo mysqli_num_rows($pres)?></span></h5>
                    </div>
                </div>
                </li>
            </ul>
            <div class="categories row mx-auto">
                <table class="col text-center table table-striped table-inverse table-responsive table-hover shadow">
                <thead class="border-bottom">
                    <tr><th cols="2" class="w-100 text-center">Doctors</tr>
                    <tr>
                        <th style="width:60%">Caytegory</th>
                        <th style="width:40%">Count<th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                </table>
                <table class="col text-center table table-striped table-inverse table-responsive table-hover shadow">
                <thead class="thead-inverse">
                    <tr><th cols="2">Tablets</tr>
                    <tr>
                        <th style="width:60%">Caytegory</th>
                        <th style="width:40%">Count<th>
                    </tr>
                </thead>
                <tbody>
                   
                </tbody>
                </table>

            </div>
            
        </section>
    </main>
    </div>
   
<?php require('Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="JS/Pesonal.js"></script>

</body>
</html>