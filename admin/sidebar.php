<aside class="shadow">
    <div id="logo" class="mx-auto">
    <div>
     <img  class="img-thumbnail rounded mt-3"/>
    </div>
     <h3 class="text-center mt-1"></h3>
    </div>
    <ul class=" unstyled mx-auto w-100">
    <?php
    $adminjsonfile=file_get_contents('../JSON/Admin.json'); 
    $Admin=json_decode($adminjsonfile,true);
    $sidebar=$Admin["Pages"];
    foreach ($sidebar as $key => $value) {   
         # code...
    ?>
    
        <li class="nav-item py-2 px-5 my-2 mx-auto text-justify">
            <a href="<?php echo $value['link'];?>" class="nav-link ">
            <b><?php echo $value['Page']; ?></b>
            </a>
            </li>
   <?php } ?>
    
    </ul>
    <div class="logout w-100 text-center bg-primary mb-0">
        <a class="text-center" href="#">logout</a>
    </div>
</aside>