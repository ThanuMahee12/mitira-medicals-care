<header class="w-100 sticky">
<nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top" >
<a class="navbar-brand mr-5" href="#" style="font-weight:800">
    <img src="img/logo.png" width="50" height="50" class="d-inline-block align-top rounded" alt="logo">
    Ayursh
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item px-3">
        <a class="nav-link menulink" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link menulink" href="Chanelling.php">Chanelling</a>
      </li>
      <li class="nav-item px-3">
        <a class="nav-link menulink" href="Disess.php">Diseses</a>
      </li>
      <li class="nav-item px-3 ">
        <a class="nav-link menulink" href="Medicine.php">Medicine</a>
      </li>
    </ul>
    <div class="form-inline my-2 my-lg-0">
    <ul class="navbar-nav mr-auto px-3">
    <li class="nav-item dropdown px-5">
        <a class="nav-link menulink  dropdown-toggle" href="Login.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user"></i>
        </a>
        <div class="dropdown-menu bg-primary " aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-white useroption" href="userRegistration.php"><i class="fas fa-user-plus mr-4"></i>Sign up</a>
          <a class="dropdown-item text-white useroption" href="Login.php"><i class="fas fa-user mr-4"></i>Sign in</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-white useroption" href="Logout.php"><i class="fa fa-sign-out mr-4" aria-hidden="true"></i>Log out</a>
        </div>
      </li>
      <li class="nav-item px-3">
        <?php 
          if(isset($_SESSION['Category'])){
            $cat=$_SESSION['Category'];
              echo "<a class='nav-link menulink' href='{$cat}DashBoard.php?usertype={$cat}'>Account</a>";
          }
        ?>
        
         
        
      </li>
    </ul>
    </div>
  </div>
</nav>
</header>
  
