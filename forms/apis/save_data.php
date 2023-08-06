<?php
include "../db.php";
session_start();
$u = $_SESSION['ApplicationId'];
$c = mysqli_real_escape_string($con,$_POST['c']);

$q2 = mysqli_query($con,"UPDATE `reg_dir` SET `all_done` = '$c' where `ApplicationId` = '$u'");
if($q2){
    echo 'Data Submitted Successfully';
    // header("Location:../home.php");
}else{
    echo "Data Not Submitted Try Again";
}

?>