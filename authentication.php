<?php
session_start();
if(isset($_POST['u'])){
   include "forms/db.php";
   $u=mysqli_real_escape_string($con,$_POST['u']);
   $p=mysqli_real_escape_string($con,$_POST['p']);
   $p=md5($p);
   $q = mysqli_query($con,"SELECT * FROM `reg_dir` where `email`='$u' and `password`='$p'");
   $row = mysqli_fetch_array($q);
   $count=mysqli_num_rows($q);
   if($count==1){
      $_SESSION['u'] = $u;
      $_SESSION['ApplicationId'] = $row['ApplicationId'];
      echo "S";
   }else{
     echo "I";
   }
}
else
{
   header("location:index.php");
}
?>