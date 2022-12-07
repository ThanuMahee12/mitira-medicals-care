<?php 
session_start();
$ct=$_POST['action'];
if($ct=="uploadreport"){

  // file upload
  $pname=$_SESSION['UserName']."_".date('d-m-y');
  $temname=$_POST['file'];
  $upload_dirreport='img\uploads\report';
  move_uploaded_file($temname,$upload_dirreport.'/'.$pname);
  echo "img/uploads/report/". $pname;
}
?>