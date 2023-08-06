<?php
    //----------------------------------------
    include "../db.php";
    session_start();
    $id= $_SESSION['ApplicationId'];
    //----------------------------------------
    $z = mysqli_real_escape_string($con,$_POST['f']);
    $status = "sub";
    // echo $z;
    if($z){
        $w = json_decode(stripslashes($z),true);
        $q  = "SELECT * FROM `qualifications` where `ApplicationId` = '$id'";
        $count = mysqli_num_rows(mysqli_query($con,$q));
        // echo "count:".$count;
        foreach($w as $qualification => $data){
            $data = explode(";",$data);
            // print_r(trim($data[1],"*")."\n");
            if($count<3){
                if(mysqli_query($con,"INSERT INTO `qualifications`(`ApplicationId`, `qualification`, `year`, `specialization`, `university`) VALUES ('$id','$qualification','".trim($data[0],"<>")."','".trim($data[1],"<>")."','".trim($data[2],"<>")."')")){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab3()', `all_done` = 'tab3()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        // echo ".";
                        $status = "sub";
                    }else{
                        echo "\n>> !";
                    }
                }else{echo "problem in inserting qdetails..!!";}
            }else{
                $q ="UPDATE `qualifications` SET `year`='".trim($data[0],"<>")."',`specialization`='".trim($data[1],"<>")."',`university`='".trim($data[2],"<>")."' WHERE `ApplicationId` = '$id' and `qualification`='$qualification'";
                $q1 = mysqli_query($con,$q);
                if($q1){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab3()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        // echo ".";
                        $status = "upd";
                    }else{
                        echo "\n >> !";
                    }
                }else{echo "\nproblem in updating details..!!";}
            }
        }
        if($status == "sub"){
            echo 'Qualification Details Submitted Successfully';
        }else{
            echo "Qualification Details Updated Successfully";
        }
    } else {echo 'Error Receiving Data to backdoor..!';}
?>