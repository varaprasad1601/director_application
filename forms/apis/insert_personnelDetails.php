<?php
    include "../db.php";
    session_start();
    $valid_extensions = array('jpeg', 'jpg', 'png','PNG','JPG','JPEG'); // valid extensions
    $path = "./pic_uploads/"; // upload directory
    //----------------------------------------
    $id= $_SESSION['ApplicationId'];
    $n = mysqli_real_escape_string($con,$_POST['applicant_name']);
    $m = mysqli_real_escape_string($con,$_POST['email']);
    $ph = mysqli_real_escape_string($con,$_POST['mobile_number']);
    $dob = mysqli_real_escape_string($con,$_POST['dob']);
    $age = mysqli_real_escape_string($con,$_POST['age']);
    $g = mysqli_real_escape_string($con,$_POST['gender']);
    $c = mysqli_real_escape_string($con,$_POST['category']);
    $a = mysqli_real_escape_string($con,$_POST['address']);
    $d = mysqli_real_escape_string($con,$_POST['p_designation']);
    $dep = mysqli_real_escape_string($con,$_POST['department']);
    $u = mysqli_real_escape_string($con,$_POST['univer']);
    $img = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    //----------------------------------------
    if($img){
        // echo "image is there";
        $ext = pathinfo($img, PATHINFO_EXTENSION);
        if(in_array($ext, $valid_extensions)) {
            $dir_img = explode(".",$img);
            $dir_imgExt = $dir_img[count($dir_img)-1];
            $dir_img = $id.".jpeg";//.$dir_imgExt;
            $path = $path.$dir_img;
            echo $path;
            //
            $datacount = mysqli_num_rows(mysqli_query($con,"SELECT * FROM personneldetails where ApplicationId = '$id'"));
            //-----------INSERTION NEW------------
            if($datacount==0){
                $q = mysqli_query($con,"INSERT INTO `personneldetails` (`ApplicationId`, `name`, `email`, `phone`, `address`, `dob`, `age`, `gender`, `picture`, `category`, `designation`, `department`, `university`) VALUES ('$id','$n','$m','$ph','$a','$dob','$age','$g','$dir_img','$c','$d','$dep','$u')");
                if($q && move_uploaded_file($tmp,$path)){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab2()', `all_done` = 'tab2()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        echo "[I&P] Personal Details Submitted Successfully";
                    }
                }else{echo "[I&P] insert problem";}
            }
            //-----------UPDATION EXISTING WITH IMAGE----------
            else{
                $q1 = mysqli_query($con,"UPDATE `personneldetails` SET `name` = '$n', `email`='$m', `phone` = '$ph', `address`='$a', `dob`='$dob', `age`='$age', `gender`='$g', `picture`='$dir_img', `category`='$c', `designation`='$d', `department`='$dep', `university`='$u'  where `ApplicationId` = '$id'");
                if($q1 && move_uploaded_file($tmp,$path)){
                    $q2 = "UPDATE `reg_dir` SET `stage` = 'tab2()' where `ApplicationId` = '$id'";
                    if(mysqli_query($con,$q2)){
                        echo "[I&P] Personal Details Updated Successfully";
                    }
                }else{echo "[I&P] update problem";}
            }
        }
    }else{
        // echo "image is not there";
        $q1 = mysqli_query($con,"UPDATE `personneldetails` SET `name` = '$n', `email`='$m', `phone` = '$ph', `address`='$a', `dob`='$dob', `age`='$age', `gender`='$g', `category`='$c', `designation`='$d', `department`='$dep', `university`='$u'  where `ApplicationId` = '$id'");
        if($q1){
            $q2 = "UPDATE `reg_dir` SET `stage` = 'tab2()' where `ApplicationId` = '$id'";
            if(mysqli_query($con,$q2)){
                echo "[I] Personal Details Updated Successfully";
            }
        }else{echo "[I] update problem";}
    }
?>