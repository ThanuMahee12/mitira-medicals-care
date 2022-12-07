<?php 
session_start();
if(!isset($_SESSION['UserID'])){
    header("location:Login.php?regms='first you must login'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
    <main class="mt-5 vh-100">
   <div class="container shadow  buyProduct vh-25">
    <div class="w-75 d-flex  align-items-center flex-column">
        <div class=" w-100 d-flex justify-content-center">
            <img class="img-thumbnail " width="400px" height="400px" src="<?php echo $_GET['image']; ?>" alt="<?php echo $_GET['image']; ?>">
        </div>
        <h2><?php echo $_GET['MedicineName']; ?></h2>
        <?php 
            $unit="";
            if(strpos($_GET['volume'],"mg")){
                $unit="/card";
            }
           
        ?>
        <h5>RS.<?php echo $_GET['Price'].$unit; ?></h5>
        <div class="vh-75">
            <form action="" method="post" id="buymedicine">
                <input type="hidden" name="onePrice" id="onePrice" value="<?php echo $_GET['Price'];?>">
                <input type="hidden" name="medid" id="medid" value="<?php echo $_GET['Medicinecode'];?>">
                <input type="hidden" name="action" id="action" value="buy">
                    <div class="form-group col-sm-12 py-2">
                        <input id="usename" class="form-control" type="text" readonly name="username" value="<?php echo $_SESSION['UserName']?>">
                    </div>
                    <div class="form-group col-sm-12 py-2">
                        <input id="count" class="form-control" type="number" name="count" placeholder="how many items">
                    </div>
                    <h5 id='total' class="text-center"></h5>
                    <?php 
                        if(strpos($_GET['MedicineName'],"*")){
                            echo ' <div class="input-group py-2 col-sm-12">
                            <span class="input-group-text" id="priscription">Priscription</span>
                            <input
                              class="btn btn-primary"
                              type="file"
                              class="form-control"
                              placeholder="priscription"
                              aria-label="priscription"
                              aria-describedby="priscription"
                              required
                            />
                            
                          </div>';
                        }        
                    ?>
                   
                    <div class="btn-group d-flex justify-content-center mt-4 buy" role="group" aria-label="Basic example">
                      <button type="submit" class="btn btn-success">Buy</button>
                      <button type="reset" class="btn btn-danger">Cancel</button>
                    </div>
            </form>
        </div>

    </div>
   </div>
    <div id="recipt"></div>
    </main>
<?php require('Footer.php');?>
<script src="JS/loginsystem.js"></script>
<script src="JS/Home.js"></script>
</body>
</html>