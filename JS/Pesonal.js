let DoctorCategory;
let DoctorCategorycount;
const  Categorycount=[];
$(document).ready(function () {
   var category;
    let pagepara=new URLSearchParams(window.location.search);
    let usertype=pagepara.get("usertype");
    $.getJSON(`http://localhost/AyushMedicals/JSON/${usertype}.json`,
    function (userobj) {
       $.each(userobj['Pages'], function (indexInArray, pages) { 
          $('#sidebar>ul').append(`<li class="nav-item order-${pages['no']} py-2 px-5 my-2 ml-3"><a href="${pages['link']}" class="nav-link text-white"><b>${pages['Page']}</b></a></li>`);
       });
   });
   $.ajax({
      type: "POST",
      url: "DoctorAjax.php",
      data: {actiond:"DoctorCate"},
      success: function (response) {
         $('.categories table:nth-child(1) tbody').append(response);
      }
   });
   $.ajax({
      type: "POST",
      url: "MedicineAjax.php",
      data: {action:"MedicineCate"},
      success: function (response) {
         $('.categories table:nth-child(2) tbody').append(response);
      }
   });
   $("#Type").change(function (e) { 
      e.preventDefault();
      if($(this).val()=="Online"){
         $("#actionformchanel").before("<div class='form-group w-50' id='q'><label for='Question'>Do you Have medical reports?</label><select class='form-control' name='Answer' id='answer' required><option value='Yes'>Yes</option><option value='no' selected>No</option></select></div>");
         $('#payment').modal();
      }
      else{
            $('#q').remove();
      }
   });
   let inputfield=`<div class='w-100 row'>
   <div class='form-group col-8'>
      <input id='repone' placeholder='reportname' class='form-control' type='text' name='repone[]'>
   </div>
   <div class='form-group col-4'>
      <input id='report' class='form-control btn btn-sm' type='file' name='repone[]'>
   </div>
   </div>`;
   $(document).on('change',"#answer",function (e) {
      e.preventDefault();
      if($(this).val()=="Yes"){
         $("#actionformchanel").before(`<div class='container w-50 shadow my-2' id='fileuploaded'><div class='row w-100 d-flex justify-content-lg-center align-items-center'><button class='btn btn-primary btn-sm' id='ad_rep'>Add report</button></div>${inputfield}</div>`);
      }
      else{
         $('#fileuploaded').remove();
      }
   });
   $(document).on('click',"#ad_rep",function (e) {
      e.preventDefault();
      $('#fileuploaded').append(inputfield);
   });
   $("#chenelingform").submit(function (e) { 
      e.preventDefault();
         $.ajax({
            type: "POST",
            url: "ChanellingAjax.php",
            data: $(this).serialize(),
            success: function (response) {
               alert(response);
               if(response=='yes'){
                  alert('Scussfully');
                  window.location.href="";
               }
               else{
                  alert('try agin');
               }
            }
         });
     });
   
$(document).on('click','#search',function(){
   let searchres=$('#searchdises').val();
   $.ajax({
      type: "POST",
      url: "DisessAjax.php",
      data: {actiondes:"search",search:searchres},
      success: function (response) {
         window.location.href="#disesContainer";
         $("#disesContainer").empty();
         $("#disesContainer").append(response);
      }
   });
});
   
$(document).on('click','#searchSerachsymbtn',function(){
   let searchres=$('#Serachsym').val();
   $.ajax({
      type: "POST",
      url: "DisessAjax.php",
      data: {actiondes:"searchsyms",search:searchres},
      success: function (response) {
         if(response){
         window.location.href="#disesContainer";
         $("#disesContainer").empty();
         $("#disesContainer").append(response);
         }
         else{
            $("#disesContainer").append("<h3>No Result conslter with our Doctor</h3>");
         }
      }
   });
});
});
function disesload(){
   $.ajax({
      type: "POST",
      url: "DisessAjax.php",
      data:{actiondes:"show"},
      success: function (response) {
         $('#disesContainer').append(response);
      }
   });
}
function userload(){
   $.ajax({
      type: "POST",
      url: "userloading.php",
      data: {action:"userload"},
      success: function (response) {
         
      }
   });
}
$(document).on('change','#report',function(){
   let report=$(this).val();
   $.ajax({
      type: "POST",
      url: "reporthotoupload.php",
      data: {file:report,action:"uploadreport"},
      success: function (response) {
         $(this).closest('.row').find('repone').val(response);
         alert(response);
      }
   });
});
$(document).on('click','.reject_btn',function(){
let id=$(this).attr('id');
let thsrow=$(this).closest('tr');
$.ajax({
   type: "POST",
   url: "ChanellingAjax.php",
   data:{actionChe:"rejectappointment",id:id},
   success: function (response) {
      alert(response);
      if(response=='ok'){
         $(thsrow).remove();
      }
   }
});
});
$(document).on('click','.make_btn',function(){
   let id=$(this).attr('id');
   $('#chenlingid').val(id);
   $('#makeAppointment').modal();
   });
   $('#addapointmentform').submit(function (e) { 
      e.preventDefault();
      $.ajax({
         type: "POST",
         url: "ChanellingAjax.php",
         data: $(this).serialize(),
         success: function (response) {
            alert(response);
         }
      });
   });
$(document).on('click','.cancel_btn',function(){
   let id=$(this).attr('id');
   $.ajax({
      type: "POST",
      url: "ChanellingAjax.php",
      data:{actionChe:"cancelappointment",id:id},
      success: function (response) {
         
      }
   });
});
$(document).on('click','.attend-btn',function() {
   let id=$(this).attr('id');
   window.location.href="#Appointment";
   $('#Appointment h5').append(id);
   $.ajax({
      type: "POST",
      url: "ChanellingAjax.php",
      data: {actionChe:"seeappointment",id:id},
      success: function (response) {
         $('#Appointment').append(response);
      }
   });
});
$(document).on('click','.Chanel',function(){
   let id=$(this).attr('id');
   $('#Doctor').val(id);
});
$('#paymentdetails').submit(function (e) { 
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: "ChanellingAjax.php",
      data: $(this).serialize(),
      success: function (response) {
         $('.chehead').append("<h3>"+response+"</h2>");
         $('#payment').modal('hide');
      }
   });
});