<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $id=$_SESSION['UserID'];
    $user="SELECT `doctor`.`classification` AS `categories`, `doctor`.`Image` AS `Image`, `doctor`.`qulification` AS `Qulification`, `doctor`.`Price` AS `Price`, `user`.`FullName` AS `FullName`, `user`.`Email` AS `Email`, `user`.`Mobileno` AS `Mobile`, `user`.`Address` AS `Address`
    FROM `doctor` 
        LEFT JOIN `user` ON `doctor`.`Doctorid` = `user`.`UserID` WHERE `doctor`.`Doctorid`='$id'";
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
    <div class="pages">
    <aside class='bg-secondary d-flex justify-content-center' id="sidebar">
        <ul class="nav text-center text-capitalize  d-flex flex-column align-items-center">    
        </ul>
    </aside>
    <main id="Content">
        <section class="shadow-lg d-flex flex-row mx-auto" style="width:90%;border-radius:2cm">
        <div class="card">
            <img class="card-img" src="<?php echo $row['Image']; ?>" width="200px" height="300px" style="border-radius:10px">
            <div class="card-img-overlay">
                <h5 class="card-title text-center shadow fw-bold"><b><?php echo $_SESSION['UserName'];?></b></h5>
            </div>
        </div>
        <ul class="align-self-md-center list-unstyled text-center mx-auto" style="font-size:18px;font-weight:900">
            <li class="py-1">Name:<?php echo $row['FullName']; ?></li>
            <li class="py-1">Email:<?php echo $row['Email']; ?></li>
            <li class="py-1">Mobile:<?php echo $row['Mobile']; ?></li>
            <li class="py-1">Address:<?php echo $row['Address']; ?></li>
            <li class="py-1">Qulification:<?php echo $row['Qulification']; ?></li>
        </ul>
        </section>

    </main>
    </div>
   
<?php require('Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="JS/Pesonal.js"></script>

</body>
</html>