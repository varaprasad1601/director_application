<?php
    include "../db.php";
    session_start();
    $id= $_SESSION['ApplicationId'];
    //----------------------------------------
    $rData = mysqli_real_escape_string($con,$_POST['r']);
    //----------------------------------------
    if($rData){
        //---
        $data = explode(";",$rData);
        $r0  = "SELECT * FROM `researchexp` where `ApplicationId` = '$id'";
        $r1 = mysqli_num_rows(mysqli_query($con,$r0));
        if($r1==0){
            $g = mysqli_query($con,"INSERT INTO `researchexp`(`ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `num_mphils_guided`, `num_phds_guided`, `num_awards_SN`, `num_awards_IntNat`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`) VALUES ('$id','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]')");
            if(!$g){
                echo "err -> t_exp inserting";
            }else{
                // echo "Data Inserted";
                $q2 = "UPDATE `reg_dir` SET `stage` = 'tab5()', `all_done` = 'tab5()' where `ApplicationId` = '$id'";
                if(mysqli_query($con,$q2)){
                    echo "Research Experience Submitted Successfully";
                }else{
                    echo "\n>> !";
                }  
            }
        }else{
            $g = mysqli_query($con,"UPDATE `researchexp` SET `num_papersPublished_Nat`='$data[0]',`num_papersPublished_IntNat`='$data[1]',`num_patents`='$data[2]',`num_booksISBN`='$data[3]',`num_MajResearchProjs`='$data[4]',`num_MinResearchProjs`='$data[5]',`fundsFor_MajProjs`='$data[6]',`fundsFor_MinProjs`='$data[7]',`num_mphils_guided`='$data[8]',`num_phds_guided`='$data[9]',`num_awards_SN`='$data[10]',`num_awards_IntNat`='$data[11]',`num_SemConfPap_Nat`='$data[12]',`num_SemConfPap_IntNat`='$data[13]',`memberships_Nat`='$data[14]',`memberships_IntNat`='$data[15]' WHERE `ApplicationId`='$id'");
            if(!$g){
                echo "err -> t_exp updating";
            }else{
                // echo "Data Updated";
                $q2 = "UPDATE `reg_dir` SET `stage` = 'tab5()' where `ApplicationId` = '$id'";
                if(mysqli_query($con,$q2)){
                    echo "Research Experience Updated Successfully";
                }else{
                    echo "\n>> !";
                }  
            }
        }
    }
?>