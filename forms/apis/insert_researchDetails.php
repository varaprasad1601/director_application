<?php
    include "../db.php";
    session_start();
    $id= $_SESSION['ApplicationId'];
    //----------------------------------------
    $rData = mysqli_real_escape_string($con,$_POST['r']);
    //----------------------------------------
    if($rData){
        $data = explode("><",$rData);
        //  print_r($data);
        // echo ">>> ".$data[20];
        //---
        $r0  = "SELECT * FROM `researchexp` where `ApplicationId` = '$id'";
        $r1 = mysqli_num_rows(mysqli_query($con,$r0));
        // echo $r1;
        if($r1==0){
            // echo "Yes";
            $g0 = "INSERT INTO `researchexp`(`ApplicationId`, `num_papersPublished_Nat`, `num_papersPublished_IntNat`, `papers_info`, `num_patents`, `num_booksISBN`, `num_MajResearchProjs`, `num_MinResearchProjs`, `fundsFor_MajProjs`, `fundsFor_MinProjs`, `maj_projectsOngoing`, `min_projectsOngoing`, `maj_fundsOngoing`, `min_fundsOngoing`, `num_mphils_guided`, `num_phds_guided`, `num_SemConfPap_Nat`, `num_SemConfPap_IntNat`, `memberships_Nat`, `memberships_IntNat`,`num_awards_S`, `num_awards_N`, `num_awards_IntNat`,`num_consultancy`,`total_amount_consultancy`) VALUES ('$id','$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]','$data[6]','$data[7]','$data[8]','$data[9]','$data[10]','$data[11]','$data[12]','$data[13]','$data[14]','$data[15]','$data[16]','$data[17]','$data[18]','$data[19]','$data[20]','$data[21]','$data[22]','$data[23]');";
            $g = mysqli_query($con,$g0);
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
            $g0 = "UPDATE `researchexp` SET `num_papersPublished_Nat`='$data[0]',`num_papersPublished_IntNat`='$data[1]',`papers_info`='$data[2]',`num_patents`='$data[3]',`num_booksISBN`='$data[4]',`num_MajResearchProjs`='$data[5]',`num_MinResearchProjs`='$data[6]',`fundsFor_MajProjs`='$data[7]',`fundsFor_MinProjs`='$data[8]',`maj_projectsOngoing`='$data[9]',`min_projectsOngoing`='$data[10]',`maj_fundsOngoing`='$data[11]',`min_fundsOngoing`='$data[12]',`num_mphils_guided`='$data[13]',`num_phds_guided`='$data[14]',`num_SemConfPap_Nat`='$data[15]',`num_SemConfPap_IntNat`='$data[16]',`memberships_Nat`='$data[17]',`memberships_IntNat`='$data[18]', `num_awards_S`='$data[19]',`num_awards_N`='$data[20]',`num_awards_IntNat`='$data[21]',`num_consultancy`='$data[22]',`total_amount_consultancy`='$data[23]' WHERE `ApplicationId`='$id';";
            $g = mysqli_query($con,$g0);
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