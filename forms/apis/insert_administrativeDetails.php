<?php
    include "../db.php";
    session_start();
    $id = $_SESSION['ApplicationId'];
    //-----------
    $p_count = mysqli_real_escape_string($con,$_POST['p_c']);
    $c_count = mysqli_real_escape_string($con,$_POST['c_c']);
    $a_pData = mysqli_real_escape_string($con,$_POST['ap']);
    $a_cData = mysqli_real_escape_string($con,$_POST['ac']);
    $info = mysqli_real_escape_string($con,$_POST['i']);
    //---------------------------------
    $h = "";
    //-----------POSITIONS-------------
    $w = json_decode(stripslashes($a_pData),true);
    $data = explode(";",$w['positions']);
    // print_r($data);
    $r0  = "SELECT * FROM `administrativeexp` where `ApplicationId` = '$id'";
    $r1 = mysqli_num_rows(mysqli_query($con,$r0));
    if($r1==0){
        //insert
        $q = mysqli_query($con,"INSERT INTO `administrativeexp`(`ApplicationId`, `position`, `fromDate`, `toDate`) VALUES ('$id','".trim($data[0],"<>")."','".trim($data[1],"<>")."','".trim($data[2],"<>")."')");
        if($q){
            echo "data inserted @pos";
            $q2 = "UPDATE `reg_dir` SET `stage` = 'tab6()', `all_done` = 'tab6()' where `ApplicationId` = '$id'";
            if(mysqli_query($con,$q2)){
                $h = $h.">";
            }else{
                $h = $h."!";
            }
        }else{
            echo "err -> p_insert";
            $h = $h."!";
        }
    }else{
        //update
        $q = mysqli_query($con,"UPDATE `administrativeexp` SET `position`='".trim($data[0],"<>")."',`fromDate`='".trim($data[1],"<>")."',`toDate`='".trim($data[2],"<>")."' WHERE `ApplicationId`='$id'");
        if($q){
            echo "p_updated";
            $q2 = "UPDATE `reg_dir` SET `stage` = 'tab6()' where `ApplicationId` = '$id'";
            if(mysqli_query($con,$q2)){
                $h = $h.">";
            }else{
                $h = $h."!";
            }
        }else{
            echo "err -> p_update";
            $h = $h."!";
        }
    }
    //----------CASES-----------
    $w = json_decode(stripslashes($a_cData),true);
    $data = explode(";",$w['cases']);
    // print_r($data);
    $r0  = "SELECT * FROM `cases` where `ApplicationId` = '$id'";
    $r1 = mysqli_num_rows(mysqli_query($con,$r0));
    if($r1==0){
        //insert
        $q = mysqli_query($con,"INSERT INTO `cases`(`ApplicationId`, `typeOf_case`, `CaseName`, `CaseStatus`) VALUES ('$id','".trim($data[0],"<>")."','".trim($data[1],"<>")."','".trim($data[2],"<>")."')");
        if($q){
            echo "data inserted @cases";
            $h = $h.">";
        }else{
            echo "err -> case_insert";
            $h = $h."!";
        }
    }else{
        //update
        $q = mysqli_query($con,"UPDATE `cases` SET `typeOf_case`='".trim($data[0],"<>")."',`CaseName`='".trim($data[1],"<>")."',`CaseStatus`='".trim($data[2],"<>")."' WHERE `ApplicationId`='$id';");
        if($q){
            echo " c_updated";
            $h = $h.">";
        }else{
            echo "err -> c_update";
            $h = $h."!";
        }
    }
    //-----------------other------------------
    $r0  = "SELECT * FROM `other` where `ApplicationId` = '$id'";
    $r1 = mysqli_num_rows(mysqli_query($con,$r0));
    if($r1==0){
        //insert
        $q = mysqli_query($con,"INSERT INTO `other`(`ApplicationId`, `OtherInformation`) VALUES ('$id','$info')");
        if($q){
            echo " i_inserted";
            $h = $h.">";
        }else{
            echo "err -> info_insert";
            $h = $h."!";
        }
    }else{
        //update
        $q = mysqli_query($con,"UPDATE `other` SET `OtherInformation`='$info' WHERE `ApplicationId`='$id';");
        if($q){
            echo " i_updated";
            $h = $h.">";
        }else{
            echo "err -> i_update";
            $h = $h."!";
        }
    }
    if($h == ">>>"){
        echo $h;
    }
?>