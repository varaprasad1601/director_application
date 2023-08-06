<?php
session_start();
if(isset($_POST['u'])){  
   include("forms/db.php");
   $id=mysqli_real_escape_string($con,$_POST['u']);
   $mobile=mysqli_real_escape_string($con,$_POST['m']);
   $password=mysqli_real_escape_string($con,$_POST['p']);
   $password=md5($password);
   //----------DirIdGeneration-----------------
      $str=rand();
      $result = md5($str);
      $result = strtoupper(substr($result,-4));
      $GENdirID = "DIR2K23".$result;
   //------------------------------------------

   $users_data = mysqli_query($con,"SELECT * FROM `reg_dir` where `email` = '$id'");
   if(mysqli_num_rows($users_data) == 1){
       echo 'Email Already Registered';
   }else{
      $q=mysqli_query($con,"insert into `reg_dir` values('$id','$mobile','$password','$GENdirID','tab1()','tab1()')");
      if($q){
         echo "saved";
      }else{
         echo "Error in registration.!";
      };
   }
}else{
   header("location:index.php");
}
?>