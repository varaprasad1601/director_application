<?php
session_start();
if(isset($_POST['id']))
{  
    include("db.php");
    $id=mysqli_real_escape_string($con,$_POST['id']);
    $otp=mysqli_real_escape_string($con,$_POST['otp']);
    $newpassword=mysqli_real_escape_string($con,$_POST['newpassword']);
    $repassword=mysqli_real_escape_string($con,$_POST['repassword']);
    $q=mysqli_query($con,"SELECT * FROM `information` where `id`='$id' and `otp`='$otp'");
    $c=mysqli_num_rows($q);
    if($c>0)
    {
        $newpassword=md5($newpassword);
        $q2=mysqli_query($con," UPDATE `information` set `password`='$newpassword' where`id`='$id'");
        echo "success";
    }
    else
    {
        echo "invalid";
    }

}
else
{
    header("location:index.php");
}
?>