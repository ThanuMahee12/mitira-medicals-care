import * as mymodels from "./Mymodel.js";
import * as System from "./Ayush.js";

$(document).ready(function () {
    System.inisystem();
    let Ayushobj=JSON.parse(sessionStorage.getItem("Ayush"));
    $("#logo h3").append(Ayushobj.name);
    $("#logo img").attr("src",Ayushobj.logo);

   $(".nav-item").hover(function () {
        // over
        $(this).addClass("bg-primary");
    }, function () {
        // out
        $(this).removeClass("bg-primary");
    }
   );
    
});





// $(document).ready(function () {
//     let currentrow=null;
//     $('#Add_items').click(function (e) { 
//         e.preventDefault();
//         $(".mimg").hide();
//         $("#AddMedicine").modal();
//         });
//         $('#AddMedicineForm').submit(function (e) { 
//             e.preventDefault();
//             var frm=new FormData(this)
//             $.ajax({
//                 type: "POST",
//                 url: "MedicineAjax.php",
//                 data:frm,
//                  contentType:false,
//                 processData:false,
//                 beforeSend:function(){
//                     if($('#idinify').val()==""){
//                         document.getElementById("save").innerText="Load..";
//                     }
//                     else{
//                         document.getElementById("save").innerText="Update..";
//                     }
                        
//                 },
//                 success: function (response) {
//                     if(response){
//                         if($('#idinify').val()==""){
//                             $('#medicinedetails tbody').append(response);
//                         }
//                         else{
//                            $(currentrow).html(response);
//                            $(".mimg").hide();
//                            $('.Mid').show();
//                            $('.moddelveiw').removeClass('d-flex');
//                            $('.moddelveiw>div').removeClass('flex-grow-1');
//                         }
//                     }
//                     else{
//                         alert('Faild try again');
//                     }
               
//                 document.getElementById("save").innerText="save";
//                 clearmodel();
//                 $("#AddMedicine").modal('hide');
//                 }
//             });
            
//         });
//         function clearmodel(){
//             $("#AddMedicineForm").find('.form-control').val("");
//             $("#action").val("insert");
//             $("#idinify").val("");
//         }
//     $(document).on('click','#edit',function(){
//         $(".mimg").show();
//         $('.Mid').hide();
//         $('.moddelveiw').addClass('d-flex');
//         $('.moddelveiw>div').addClass('flex-grow-1');
//         currentrow=$(this).closest("tr");
//         let medicineid=$(currentrow).attr('id');
//         let medicinename=$(currentrow).find("td:eq(0)").text();
//         let Image=$(currentrow).find("td:eq(1) img").attr("src");
//         let IncludeItems=$(currentrow).find("td:eq(2)").text();
//         let Manifucture_Date=$(currentrow).find("td:eq(3)").text();
//         let Expried_Date=$(currentrow).find("td:eq(4)").text();
//         let Price=$(currentrow).find("td:eq(5)").text();
//         let Category=$(currentrow).find("td:eq(6)").text();
//         let Volume=$(currentrow).find("td:eq(7)").text();
//         $(".mimg").attr("src",Image);
//         $('#file').attr('title', Image);
//         $("#AddMedicine").modal();
//         $('#idinify').val(medicineid);
//         $('#action').val("update");
//         $("#MedicineName").val(medicinename);
//         $("#includeitems").val(IncludeItems);
//         $("#ManifuctureDate").val(Manifucture_Date);
//         $("#Price").val(Price);
//         $('#MedicineCode').val(medicineid);
//         $(`#Category option[value=${Category}]`).attr('selected','selected');
//         $("#ExpriedDate").val(Expried_Date);
//         $("#Volume").val(Volume);
//     });
//     $(document).on('click','#delete',function(){
//         currentrow=$(this).closest("tr");
//         let medicineid=$(currentrow).attr('id');
//         $.ajax({
//             type: "POST",
//             url: "MedicineAjax.php",
//             data:{MedicineCode:medicineid,action:"delete"},
//             success: function (response) {
//                 if(response){
//                     $(currentrow).remove();
//                 }
//                 else{
//                     alert('Faild try again');
//                 }
        
//             }
//         });
//     });
//     // Paient Details
//     let currentrowPatient=null;
//     let selectedval=null;
//     $('.Optional').hide();
//     $('#Add_Paitents').click(function (e) { 
//         e.preventDefault();
//         $("#AddPaients").modal();
//         });
//         $('#AddPaientForm').submit(function (e) { 
//             e.preventDefault();
//             $.ajax({
//                 type: "POST",
//                 url: "PatientAjax.php",
//                 data:$(this).serialize(),
//                 beforeSend:function(){
//                     if($('#idinifyp').val()==""){
//                         document.getElementById("savep").innerText="Load..";
//                     }
//                     else{
//                         document.getElementById("savep").innerText="Update..";
//                     }
                        
//                 },
//                 success: function (response) {
//                     if(response){
//                         if($('#idinifyp').val()==""){
//                             $('#paientdetails tbody').append(response);
//                         }
//                         else{
//                            $(currentrow).html(response);
//                            alert(response);
//                            $('.Optional').hide();
//                            $('.Optional2').show();
//                         }
//                     }
//                     else{
//                         alert('Faild try again');
//                     }
               
//                 document.getElementById("savep").innerText="save";
//                 clearmodel();
//                 $("#AddPaients").modal('hide');
//                 }
//             });
            
//         });
//         function clearmodel(){
//             $("#AddPaientForm").find('.form-control').val("");
//             $("#actionp").val("insert");
//             $("#idinifyp").val('');
//         }
//     $(document).on('click','#editp',function(){
//         $('.Optional').show();
//         let Username;
//         currentrowPatient=$(this).closest("tr");
//         let PaientId=$(currentrowPatient).attr('id');
//         $.ajax({
//             type: "POST",
//             url: "PatientAjax.php",
//             data: {updateid:PaientId,actionp:"updateperson"},
//             success: function (response) {
//             let res=response.split('_');

//             $("#Username").val(res[1]);
//             $("#FullName").val(res[9]);
//             $("#DOB").val(res[3]);
//             $("#Address").val(res[13]);
//             $('#Email').val(res[5]);
//             $(`#BloodGroup option[value=${res[7]}]`).attr('selected','selected');
//             $("#Mobile").val(res[4]);
//             alert(res[4]);
//             $('#PaidStatus').val(res[8]);
//             $('#NIC').val(res[6]);
//             $('#Height').val(res[10]);
//             $('#Weight').val(res[11]);
//             $('#Special').val(res[12]);
//             $('#Password').val(res[13]);
//             if(res[2]=="Male"){
//                 $("#Male").prop("checked", true);
//             }
//             else{
//                 $("#Female").prop("checked", true);
//             }
//             }
//         });
//         $('#idinifyp').val(PaientId);
//         $('#actionp').val("update");
//         $("#AddPaients").modal();
        
//     });
//     $(document).on('click','#deletep',function(){
//         currentrowPatient=$(this).closest("tr");
//         let Patientid=$(currentrowPatient).attr('id');
//         let txt;
//         if (confirm("Prementaly delete user")) {
//             txt = "OK";
//           } else {
//             txt = "NO";
//           }
//         $.ajax({
//             type: "POST",
//             url: "PatientAjax.php",
//             data:{Patientid:Patientid,actionp:"delete",table:txt},
//             success: function (response) {
//                 if(response){
//                     $(currentrowPatient).remove();
//                 }
//                 else{
//                     alert('Faild try again');
//                 }
        
//             }
//         });
//     });
//     $('#BloodGroup').change(function (e) { 
//         e.preventDefault();
//         selectedval=$("#BloodGroup").val();
//     });
//     // Doctor
    
//     let currentrowDoctor=null;
//     $('.Optional').hide();
//     $('#Add_Doctor').click(function (e) { 
//         e.preventDefault();
//         $("#AddDoctor").modal();
//         });
//         $('#AddDoctorForm').submit(function (e) { 
//             e.preventDefault();
//             let Dfrm=new FormData(this);
//             $.ajax({
//                 type: "POST",
//                 url: "DoctorAjax.php",
//                 data:Dfrm,
//                 contentType:false,
//                 processData:false,
//                 beforeSend:function(){
//                     if($('#idinifyd').val()==""){
//                         document.getElementById("saved").innerText="Load..";
//                     }
//                     else{
//                         document.getElementById("saved").innerText="Update..";
//                     }
                        
//                 },
//                 success: function (response) {
//                     if(response){
//                         alert(response);
//                         if($('#idinifyd').val()==""){
//                             $('#Doctordetails tbody').append(response);
//                         }
//                         else{
//                            $(currentrow).html(response);
//                            $('.Optional').hide();
//                         }
//                     }
//                     else{
//                         alert('Faild try again');
//                     }
               
//                 document.getElementById("saved").innerText="save";
//                 clearmodel();
//                 $("#AddPaients").modal('hide');
//                 }
//             });
            
//         });
//         function clearmodel(){
//             $("#AddDoctorForm").find('.form-control').val("");
//             $("#actiond").val("insert");
//             $("#idinifyd").val('');
//         }
//     $(document).on('click','#editd',function(){
//         $('.Optional').show();
//         // $('.Optional2').hide();
//         currentrowDoctor=$(this).closest("tr");
//         let DoctorId=$(currentrowDoctor).attr('id');
//         $.ajax({
//             type: "POST",
//             url: "DoctorAjax.php",
//             data: {updateid:DoctorId,actiond:"updatedoctor"},
//             success: function (response) {
//             let res=response.split('_');
//             $("#Username").val(res[1]);
//             $("#FullName").val(res[8]);
//             $("#DOB").val(res[3]);
//             $("#Address").val(res[12]);
//             $('#Email').val(res[5]);
//             $(`#Classfication option[value=${res[7]}]`).attr('selected','selected');
//             $("#Mobile").val(res[4]);
//             $('#NIC').val(res[6]);
//             $('#Salary').attr('value',res[10]);
//             $('#Qulification').val(res[11]);
//             $('#Password').val(res[13]);

//             }
//         });
//         $('#idinifyd').val(DoctorId);
//         $('#actiond').val("update");
//         $("#AddDoctor").modal();
        
//     });
//     $(document).on('click','#deleted',function(){
//         currentrowDoctor=$(this).closest("tr");
//         let Doctortid=$(currentrowDoctor).attr('id');
//         let txt;
//         if (confirm("Prementaly delete Doctor")) {
//             txt = "OK";
//           } else {
//             txt = "NO";
//           }
//         $.ajax({
//             type: "POST",
//             url: "DoctorAjax.php",
//             data:{Doctorid:Doctortid,actiond:"delete",table:txt},
//             success: function (response) {
//                 if(response){
//                     $(currentrowDoctor).remove();
//                 }
//                 else{
//                     alert('Faild try again');
//                 }
        
//             }
//         });
//     });
//       // Disess Details
//       let currentrowDiseses=null;

//       $('#Add_Diseses').click(function (e) { 
//           e.preventDefault();
//           $("#AddDiseses").modal();
//           });
//           $('#AddDisesesForm').submit(function (e) { 
//               e.preventDefault();
//               $.ajax({
//                   type: "POST",
//                   url: "DisessAjax.php",
//                   data:$(this).serialize(),
//                   beforeSend:function(){
//                       if($('#idinifydes').val()==""){
//                           document.getElementById("savedes").innerText="Load..";
//                       }
//                       else{
//                           document.getElementById("savedes").innerText="Update..";
//                       }
                          
//                   },
//                   success: function (response) {
//                     alert(response);
//                       if(response){
//                           if($('#idinifydes').val()==""){
//                               $('#Disesesdetails tbody').append(response);
//                           }
//                           else{
//                              $(currentrow).html(response);
//                              alert(response);
//                           }
//                       }
//                       else{
//                           alert('Faild try again');
//                       }
                 
//                   document.getElementById("savedes").innerText="save";
//                   clearmodel();
//                   $("#AddDiseses").modal('hide');
//                   }
//               });
              
//           });
//           function clearmodel(){
//               $("#AddDisesesForm").find('.form-control').val("");
//               $("#actiondes").val("insert");
//               $("#idinifydes").val('');
//           }
//       $(document).on('click','#editdes',function(){
//           let Username;
//           currentrowDiseses=$(this).closest("tr");
//           let   DisesesId=$(currentrowDiseses).attr('id');
//           $.ajax({
//               type: "POST",
//               url: "PatientAjax.php",
//               data: {updateid:DisesesId,actiondes:"updateDiseses"},
//               success: function (response) {
              
//               }
//           });
//           $('#idinifydes').val(PaientId);
//           $('#actiondes').val("update");
//           $("#AddDiseses").modal();
          
//       });
//       $(document).on('click','#deletedes',function(){
//         currentrowDiseses=$(this).closest("tr");
//           let DisesesId=$(currentrowDiseses).attr('id');
//           $.ajax({
//               type: "POST",
//               url: "DisessAjax.php",
//               data:{DisesesId:DisesesId,actiondes:"delete"},
//               success: function (response) {
//                   if(response=="ok"){
//                       $(currentrowDiseses).remove();
//                   }
//                   else{
//                       alert('Faild try again');
//                   }
          
//               }
//           });
//       })
// });
// $.getJSON("https://localhost/AyushMedicals/JSON/Admin.json",
//     function (Medicinecategory) {
//         $.each(Medicinecategory['MedicineCategory'], function (indexInArray, valueOfElement) { 
//              $("#Category").append(`<option value="${valueOfElement}">${valueOfElement}</option>`);
//         });
//     }
// );
// $("#Image").change(function (e) { 
//     e.preventDefault();
//     $("#Images").append($(this).val()+'____');
    
// });