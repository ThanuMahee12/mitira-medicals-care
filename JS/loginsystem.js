$('#password').keyup(function (e) { 
   if($('#username').val()===""){
        document.getElementById('error').innerHTML="Enter your UserName or Email Id";
        $('#username').css('border-color', 'red');
        $('#password').val(null);
   }
});
$('#login').click(function(e){
   e.preventDefault();
   if($('#password').val()=="" || $('#username').val()==""){
      e.stopPropagation();
      document.getElementById('error').innerHTML="Invalid Login";
      $('#password').css('border-color', 'red');
      $('#username').css('border-color', 'red');
   }
   else{
      $.post($("#loginform").attr("action"), $("#loginform :input").serializeArray(),function(result){
         document.getElementById('error').innerHTML=result;
         if(result=="Unknown user or Email"){
            $('#username').css('border-color', 'red');
         }
         else if(result=="password not match"){
            $('#password').css('border-color', 'red');
         }
         else{
            $('#error').css('color','green');
            $('#password').css('border-color', 'green');
            $('#username').css('border-color', 'green');
            window.location.href=`https://localhost/AyushMedicals/${result}DashBoard.php?usertype=${result}`;
         }
      });
      $('#loginform').submit(function (e) { 
         e.preventDefault();
         
         false;
      });
   }

});
(() => {
   'use strict';

   const forms = document.querySelectorAll('#userRegistration');
   // Loop over them and prevent submission
   Array.prototype.slice.call(forms).forEach((form) => {
     form.addEventListener('submit', (event) => {
       if (!form.checkValidity()) {
         event.preventDefault();
         event.stopPropagation();
       }
       form.classList.add('was-validated');
     }, false);
   });
 })();

$( document ).ready( function () {
   $("#reset").click(function (e) { 
      e.preventDefault();
   });
   
   $.validator.setDefaults( {
      submitHandler: function () {
         alert('sumiited');
      }
   } );
   $( "#userRegistration" ).validate( {
      rules: {
         firstname: "required",
         lastname: "required",
         UserName:{
            required:true,
            maxlength:30,
            minlength:10

         },
         password: {
            required: true,
            minlength: 8,
            maxlength:15
         },
         confPassword: {
            required: true,
            minlength: 8,
            maxlength:15,
            equalTo: "#newPassword"
         },
         email: {
            required: true,
            email: true
         },
         agree: "required"
      },
      messages: {
         firstname: "Please enter your firstname",
         lastname: "Please enter your lastname",
         UserName:{
            required:"Enter the user name",
            maxlength:"careters are less then 30",
            minlength:"Your password must be at least 10 characters long"

         },
         password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
            maxlength:"Your password must be at less then 20 characters long"
         },
         confPassword: {
            required: "Please provide a password",
            minlength: "Your password must be at least 8 characters long",
            maxlength:"Your password must be at less then 15 characters long",
            equalTo: "Please enter the same password as above"
         },
         email: "Please enter a valid email address",
         agree: "Please accept our policy"
      },
      errorElement: "em",
      errorPlacement: function ( error, element ) {
         // Add the `help-block` class to the error element
         error.addClass( "help-block" );

         if ( element.prop( "type" ) === "checkbox" ) {
            error.insertAfter( element.parent( "label" ) );
         } else {
            error.insertAfter( element );
         }
      },
      highlight: function ( element, errorClass, validClass ) {
         $( element ).parents( ".col-sm-5" ).addClass( "has-error" ).removeClass( "has-success" );
      },
      unhighlight: function (element, errorClass, validClass) {
         $( element ).parents( ".col-sm-5" ).addClass( "has-success" ).removeClass( "has-error" );
      }
   } );
   

} );
$('#resetpass').click(function (e) { 
   e.preventDefault();
   $('#resetpassword').modal('toggle');
});
$('#Email').keyup(function (e) { 
   let email=$(this).val();
   if(email.includes("@")){
      $(".errorpass").text("");
      $(".errorpass").hide();
   }
   else{
      $(".errorpass").text("invalid Email");
   }
});
$('#Confpassword').keyup(function (e) { 
   let confpass=$(this).val();
   if(confpass==$("#Password").val()){
      $(".errorpass").text("");
      $(".errorpass").hide();
   }
   else{
      $(".errorpass").text("not match password");
   }
});

$("#resetpassword").submit(function (e) { 
   e.preventDefault();
   $.ajax({
      type: "POST",
      url: "userloading.php",
      data:$(this).serialize(),
      success: function (response) {
        if(response=="ok"){
         $('#resetpassword').modal('hide');
         $("#error").removeClass('text-danger');
         $("#error").addClass('text-success');
         $('#error').text("password reset scuss");
        }
        else{
         $(".errorpass").text("invalid");
        }
      }
   });
});