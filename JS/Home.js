$(document).ready(function (){
    let carouselindicators=1;
    let homecontent;
    let medcines;
    $.ajax({
      type: "POST",
      url: "HomeContetns.php",
      success: function (response) {
        homecontent=response.split("-----");
      }
    });
    let imgcontainer=document.getElementById('inner');
    let buttoncom=document.getElementById('indicators');
    $.getJSON("http://localhost/AyushMedicals/JSON/Home.json",
        function (Homeobject) {
            $.each(Homeobject['owerveiws']['seens'], function (indexInArray, seens) { 
                 let veiw=`<div id='usersitems' class="carousel-item" data-bs-interval="${seens['interval']}">
                 <img src="${seens['Image']}" class="d-block w-100 vh-100" alt="${seens['Image']}">
                 <div class="carousel-caption d-none d-md-block">
                   <h5 class="${seens['hstyle']}">${seens['Title']}</h5>
                   <p class="${seens['pstyle']}">${seens['content']}</p>
                 </div>
               </div>`;
               $(imgcontainer).append(veiw);
               $(buttoncom).append(`<button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="${carouselindicators}" aria-current="true" aria-label="Slide ${carouselindicators}"></button>`);
               carouselindicators++;
               let Contentofpages=`<div id="${seens['id']}" class="border-bottom border-secondary position-relative"><h1 class='text-center h2 '>${seens['headings']}</h1><p class="jumbotron led vh-25">${homecontent[indexInArray]}</p></div>`;
               $('#HomeBody').append(Contentofpages);
            });
        }
    );
   $.ajax({
    type: "POST",
    url: "MedicineAjax.php",
    data: {action:"show"},
    success: function (response) {
      medcines=response;
      $("#medicineContainer").append(response);
    }
   });
    $(document).on('click','.seemore',function(){
        let mid=$(this).attr('id');
        $.ajax({
          type: "POST",
          url: "MedicineAjax.php",
          data: {action:"oneshow",id:mid},
          success: function (response) {
            $("#seeitems").html(response);
          }
         });
    });
    $(document).on('keyup','#Search',function(){
      let search=$(this).val();
      if(search!=""){
      $.ajax({
        type: "POST",
        url: "MedicineAjax.php",
        data: {action:"search",search:search},
        success: function (response) {
            if(response){
              sessionStorage.setItem("medicine",medcines);
              $("#medicineContainer").empty();
              $("#medicineContainer").append(response);
            }
        }
       });
      }
  });

});
$("#count").keyup(function (e) { 
  e.preventDefault();
  $('#total').text($(this).val()*$('#onePrice').val());
});
$('#buymedicine').submit(function (e) { 
  e.preventDefault();
  $.ajax({
    type: "POST",
    url: "MedicineAjax.php",
    data:$(this).serialize(),
    success: function (response) {
      if(response=="ok"){
        window.location.href="#recipt";
        $('#recipt').append(response);
      }
     
    }
  });
  
});
