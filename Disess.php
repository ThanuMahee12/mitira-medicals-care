<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require('head.php');?>
    <link rel="stylesheet" href="CSS/layout.css">
</head>
<body onload="disesload()">
<?php require('header.php');?>
    <main class="diseses">
    <div class="input-group col-4 position-absolute" style="top:80px;left:66%">
        <input type="text" class="form-control" placeholder="search" aria-label="search" aria-describedby="search" id="searchdises">
        <span class="input-group-text" id="search"><i class="fa fa-search" aria-hidden="true"></i></span>
    </div>
    <div  id="disesSearchContainer">
    <div class="input-group col-10 mx-auto mt-4">
        <input type="text" class="form-control" placeholder="Enter the symtoms(sym1,sym2)" aria-label="search" aria-describedby="search" id="Serachsym">
        <span class="input-group-text" id="searchSerachsymbtn"><i class="fa fa-search" aria-hidden="true"></i></span>
    </div>
    <div>
    <div  id="disesContainer"><div>
    </main>
<?php require('Footer.php');?>
<script src="JS/Pesonal.js"></script>
</body>
</html>