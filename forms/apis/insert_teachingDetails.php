<?php
    //----------------------------------------
    include "../db.php";
    session_start();
    $id= $_SESSION['ApplicationId'];
    //----------------------------------------
    $tx = mysqli_real_escape_string($con,$_POST['tx']);
    $len = mysqli_real_escape_string($con,$_POST['len']);
    $left = mysqli_real_escape_string($con,$_POST['left']);
    $tData = mysqli_real_escape_string($con,$_POST['t']);


    //----------------------------------------
    if($tData){
        //--------
        $ct0  = "SELECT * FROM `teachingexp` where `ApplicationId` = '$id'";
        $ct1 = mysqli_num_rows(mysqli_query($con,$ct0));
        if($ct1==0){
            $g = mysqli_query($con,"INSERT INTO `teachingexp` (`ApplicationId`,`total_exp`, `len_prof_service`, `leftover_service`) VALUES ('$id','$tx','$len','$left')");
            if(!$g){echo "err -> texp inserting";}    
        }else{
            $g = mysqli_query($con,"UPDATE `teachingexp` SET `total_exp`='$tx',`len_prof_service` = '$len',`leftover_service` = '$left' where `ApplicationId` = '$id'");
            if(!$g){echo "err -> texp updating";}    
        }
        //--------
        $w = json_decode(stripslashes($tData),true);
        //--------------
        $q  = "SELECT * FROM `worked_universities` where `ApplicationId` = '$id'";
        $count = mysqli_num_rows(mysqli_query($con,$q));
        $status = "sub";
        //---------------
        foreach($w as $teachingRole => $data){
            $data = explode(";",$data);
            if($count < 3){
                if(mysqli_query($con,"INSERT INTO `worked_universities`(`ApplicationId`, `designation`, `dateOfAppointment`, `university`, `privateCollege`) VALUES ('$id','$teachingRole','".trim($data[0],"*")."','".trim($data[1],"*")."','".trim($data[2],"*")."')")){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab4()', `all_done` = 'tab4()' where `ApplicationId` = '$id'";
                    // $q2 = "UPDATE `reg_dir` SET `stage` = 'tab3()', `all_done` = 'tab3()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        // echo ">";
                        $status = "sub";
                    }else{
                        echo "\n>> !";
                    }
                }else{echo "problem in inserting tdetails..!!";}
            }else{
                $q = "UPDATE `worked_universities` SET `dateOfAppointment`='".trim($data[0],"*")."',`university`='".trim($data[1],"*")."',`privateCollege`='".trim($data[2],"*")."' WHERE `ApplicationId`='$id' and `designation`='$teachingRole'";
                $q1 = mysqli_query($con,$q);
                if($q1){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab4()' where `ApplicationId` = '$id'";
                    // $q2 = "UPDATE `reg_dir` SET `stage` = 'tab3()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        // echo ">";
                        $status = "upd";
                    }else{
                        echo "\n >> !";
                    }
                }else{echo "\nproblem in updating details..!!";}
            }
        }
        if($status == "sub"){
            echo 'Teaching Experience Submitted Successfully';
        }else{
            echo "Teaching Experience Updated Successfully";
        }
    } else {echo 'Error Receiving Data to backdoor..!';}
?>