<?php
    include "../db.php";
    session_start();
    $u = $_SESSION['ApplicationId'];
    $c = mysqli_real_escape_string($con,$_POST['c']);

    $check  = "SELECT * FROM `applied_campus` where `ApplicationId` = '$u'";
    $r1 = mysqli_num_rows(mysqli_query($con,$check));
    if($r1 == 0){
        $q = "INSERT into `applied_campus` (`ApplicationId`, `appliedCampus`) VALUES ('$u','$c')";
        if(mysqli_query($con,$q)){
            echo "S";
        }else{
            echo "Problem in DataInsertion..!!";
        }
    }else{
        $q = "UPDATE `applied_campus` SET `appliedCampus` = '$c' WHERE `ApplicationId` = '$u'";
        if(mysqli_query($con,$q)){
            echo "S";
        }else{
            echo "Problem in DataInsertion..!!";
        }
    }
?>