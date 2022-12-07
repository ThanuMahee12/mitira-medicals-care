<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body>
<?php require('header.php');?>
<main>
<div id="carouselExampleDark" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
  <div class="carousel-indicators" id="indicators">
  <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" aria-current="true" aria-label="Slide 1" class="active"></button>
  </div>
  <div class="carousel-inner" id="inner">
        <div class="carousel-item active" data-bs-interval="10000">
                 <img src="img\img5.png" class="d-block w-100 vh-100" alt="img\img5.png">
                 <div class="carousel-caption d-none d-md-block fistcor">
                   <h5 class="text-dark display-4 fw-bold">Stay Home And Take Readments</h5>
                   <p class='text-muted h5'>we provide All Services via <a class="link-primary" href="#Online_Medical">online</a>appointments</p>
                 </div>
       </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div id="HomeBody" data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-offset="0" class="scrollspy-example text-justify" tabindex="0">
    <div id="Online_Medical" class="border-bottom border-secondary">
      <h4 class='text-center h2'>Online Medical</h4>
      <p class="jumbotron led ">We provide Highly Technical methode for deal with Paients we are provide online Doctor consollering,readments,and disscussion with doctors, and online shippinng our medicine but we varify the doctor certificates for impotants mdicines via online patiens can upload Their varfied clinc notes or doctor priscriptions.and also patiants can see about common,<a href="#" class="text-decoration-none">medical knoledege </a>and get some suggustions in it.Healthguard Pharmacy Limited a 100% subsidiary of Sunshine Healthcare is one of the 1st branded retail Pharmaceutical Chains in Sri Lanka that has entered the market with a view of creating a difference in the retail pharmaceutical trade. Headed by a team of professionals, Healthguard has introduced an innovative concept centered on superior customer care, latest technology in data management, a wide product assortment, affordable prices and a host of value additions.</p>
    </div> 
    <div class="dropdown-divider"></div>
</div>
</main>
<?php require('Footer.php');?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
<script src="JS/Home.js"></script>
</body>
</html>