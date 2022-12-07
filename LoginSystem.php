<?php 
 require ('conf.php');
 session_start();
 $username_email = $_POST["username"];
 $password=$_POST["password"];
$userQuery="SELECT * FROM user WHERE username='$username_email' OR Email='$username_email'";
$loginresult=$Ayushconnect->query($userQuery);
    if(mysqli_num_rows($loginresult)>0){
        while($row=mysqli_fetch_assoc($loginresult)){
            if($row['Password']==$password){
              $_SESSION['UserName']=$row['UserName'];
              $_SESSION['UserID']=$row['UserID'];
              $_SESSION['Email']=$row['Email'];
              $_SESSION['Category']= $row['Category'];
              echo $row['Category'];
        }
            else{
                echo "password not match";
            }
        }
    }
    else{
        echo 'Unknown user or Email';
    }
?>