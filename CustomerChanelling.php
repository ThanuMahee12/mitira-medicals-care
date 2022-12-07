<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $id=$_SESSION['UserID'];
    $user="SELECT `chenlling`.`Paitenid` AS `PaitentId`, `user`.`UserName` AS `UseName`, `chenlling`.`Doctorid` AS `Doctorid`, `chenlling`.`Descrption` AS `Description`
    FROM `chenlling`
        , `user`
    WHERE `chenlling`.`Paitenid` = `user`.`UserID` AND `user`.`UserID`='$id';";
    $app=$Ayushconnect->query($user);

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
    <main class='col-md-10 Appointments' id="Content">
        <section class="shadow-lg d-flex flex-row mx-auto" style="width:90%;border-radius:2cm">
            <table class="w-100 text-center table table-striped table-inverse">
                <thead class="bg-secondary">
                    <tr>
                        <th>AppointMentID</th>
                        <th>Doctor</th>
                        <th>Bookingdate</th>
                        <th>Reports</th>
                        <th>Replay</th>
                        <th>opertions</th>
                    </tr>
                </thead>
                <?php while($rows=mysqli_fetch_assoc($app)){ ?>
                <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><button class="btn btn-success btn-sm ml-2" id=""><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" id="" class="btn btn-danger btn-sm cancelp_btn">cancel</button>
                        <button type="button" id="" class="btn btn-success g_btn btn-sm">Go</button>
                </div>
                </td>
                </tr>
                <?php } ?>
                <thead>

                </thead>
            </table>
        </section>
                </main>
    </div>
   
<?php require('Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="JS/Pesonal.js"></script>

</body>
</html>S