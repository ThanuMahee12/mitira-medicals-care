<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $id=$_SESSION['UserID'];
    $nowdate=date('d-m-y',strtotime("-1 week"));
    $now1date=date('d-m-y');
    $Appointment="SELECT `appointment`.`Appointmentcode` AS `Appointmentcode`, `appointment`.`Date` AS `Appointmentdate`, `chenlling`.`Paitenid` AS `patientid`, `chenlling`.`Reportno` AS `Reportno`, `user`.`UserName` AS `Name`, `user`.`Mobileno` AS `Mobile`, `chenlling`.`Doctorid` AS `Drid`
    FROM `appointment`
        , `chenlling`
        , `user`
    WHERE `chenlling`.`ChenallingId`= `appointment`.`Chenallingid` AND `chenlling`.`Doctorid` = '$id';";
    $app=$Ayushconnect->query($Appointment);
    
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
                        <th>Paitentname</th>
                        <th>Mobile</th>
                        <th>AppointmenDate</th>
                        <th>ReportNo</th>
                    </tr>
                </thead>
                <?php while($rows=mysqli_fetch_assoc($app)){ ?>
                <tr>
                <td><?php echo $rows['Name']; ?></td>
                <td><?php echo $rows['Mobile']; ?></td>
                <td><?php echo $rows['Appointmentdate']; ?></td>
                <td><?php echo $rows['Reportno']; ?><button class="btn btn-success btn-sm ml-2" id="<?php echo $rows['Reportno']; ?> "><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                </tr>
                <?php } ?>
                <thead>

                </thead>
            </table>
        </section>

    </main>
    </div>
</div>
   
<?php require('Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="JS/Pesonal.js"></script>

</body>
</html>

