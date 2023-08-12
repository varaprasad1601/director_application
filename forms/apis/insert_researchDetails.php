<?php
    include "../db.php";
    session_start();
    $id= $_SESSION['ApplicationId'];
    //----------------------------------------
    $rData = mysqli_real_escape_string($con,$_POST['r']);
    //----------------------------------------
    if($rData){
        $data = explode(";",$rData);
        print_r($data);
        /*
        //---
        $r0  = "SELECT * FROM `researchexp` where `ApplicationId` = '$id'";
        $r1 = mysqli_num_rows(mysqli_query($con,$r0));
        if($r1==0){
            $g = mysqli_query($con,"INSERT INTO `researchexp`(`ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `papers_info`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `num_projectsCompleted`, `num_reportsSubmitted`, `num_mphils_guided`, `num_phds_guided`, `num_awards_S`, `num_awards_N`, `num_awards_IntNat`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`) VALUES ('','','','','','','','','','','','','','','','','','','','','',)");
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
            $g = mysqli_query($con,"UPDATE `researchexp` SET `num_papersPublished_Nat`='$data[0]',`num_papersPublished_IntNat`='$data[1]',`papers_info`='$data[2]',`num_patents`='$data[3]',`num_booksISBN`='$data[4]',`num_MajResearchProjs`='$data[5]',`num_MinResearchProjs`='$data[6]',`fundsFor_MajProjs`='$data[7]',`fundsFor_MinProjs`='$data[8]',`num_projectsCompleted`='$data[9]',`num_reportsSubmitted`='$data[10]',`num_mphils_guided`='$data[11]',`num_phds_guided`='$data[12]',`num_SemConfPap_Nat`='$data[13]',`num_SemConfPap_IntNat`='$data[14]',`memberships_Nat`='$data[15]',`memberships_IntNat`='$data[16]',`num_awards_S`='$data[17]',`num_awards_N`='$data[18]',`num_awards_IntNat`='$data[19]' WHERE `ApplicationId`='$id'");
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
        }*/
    }
?>