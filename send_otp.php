<?php
if(isset($_POST['u'])){  
    include("forms/db.php");
    $id = mysqli_real_escape_string($con,$_POST['u']);
    
    //----------DirIdGeneration-----------------
       $str=rand();
       $result = md5($str);
       $result = strtoupper(substr($result,-4));
       $GENdirID = "DIR2K23".$result;

    $users_data = mysqli_query($con,"SELECT * FROM `reg_dir` where `email` = '$id'");
    if(mysqli_num_rows($users_data) == 1){
        echo 'success';
    }else{
        echo 'Email Not Registered';
    }
}else{
    header("location:index.php");
}
?>