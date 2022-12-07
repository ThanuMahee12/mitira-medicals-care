<?php 
    session_start();
    if(!isset($_SESSION['UserID'])){
        header("Location:Login.php");
    }
    include("Conf.php");
    $id=$_SESSION['UserID'];
    $now1date=date('d-m-y');
    $Appointment="SELECT `appointment`.`Appointmentcode` AS `Appointmentid`, `appointment`.`Chanellingid` AS `ChennelingId`, `appointment`.`Date` AS `AppointmentDate`, `chenlling`.`Paitenid` AS `Paitent`, `chenlling`.`Doctorid` AS `Doctor`
    FROM `appointment`
        , `chenlling`
    WHERE `chenlling`.`Doctorid` = '$id' AND `appointment`.`Date`> '$now1date';";
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
                        <th>AppointMentID</th>
                        <th>Paient</th>
                        <th>Bookingdate</th>
                        <th>Chenelling</th>
                        <th>opertions</th>
                    </tr>
                </thead>
                <?php while($rows=mysqli_fetch_assoc($app)){ ?>
                <tr>
                <td><?php echo $rows['Appointmentid']; ?></td>
                <td><?php echo $rows['Paitent']; ?></td>
                <td><?php echo $rows['AppointmentDate']; ?></td>
                <td><button class="btn btn-success btn-sm ml-2" id="<?php echo $rows['ChennelingId']; ?>"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
                <td>
                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                        <button type="button" id="<?php echo $rows['ChennelingId']; ?>" class="btn btn-danger btn-sm cancel_btn">cancel</button>
                        <button type="button" id="<?php echo $rows['Appointmentid']; ?>" class="btn btn-success attend-btn btn-sm">Attend</button>
                </div>
                </td>
                </tr>
                <?php } ?>
                <thead>

                </thead>
            </table>
        </section>
        <section class="container" id="Appointment">
       
        </section>

    </main>
    </div>
    <div class="modal" tabindex="-1" id="makeAppointment">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Appointment</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" id="addapointmentform" method="post">
            <div class="row">
            <div class="form-group col-12">
                <label for="Appointmentdate">Appointment date</label>
                <input  class="form-control" type="hidden"  id="chenlingid" name="chenlingid">
                <input  class="form-control" type="hidden" value="fixedappointment" id="actionChe" name="actionChe">
                <input id="Appointmentdate" class="form-control" type="datetime-local" name="Appointmentdate">
            </div>
            </div>
            
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
   
<?php require('Footer.php');?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="JS/Pesonal.js"></script>

</body>
</html>

