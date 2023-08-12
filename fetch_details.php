<?php
    $uid = $_SESSION['ApplicationId'];
    $campus_data = mysqli_query($con,"SELECT `appliedCampus` FROM `applied_campus` where `ApplicationId` = '$uid'");
    $campus = mysqli_fetch_row($campus_data);


    $q = mysqli_query($con,"SELECT `all_done` from `reg_dir` where `ApplicationId` = '$uid'");
    $tab_num = mysqli_fetch_row($q);

    $sta = mysqli_query($con,"SELECT `stage` from `reg_dir` where `ApplicationId` = '$uid'");
    $stage_num = mysqli_fetch_row($sta);


    // Personal Details =======================================================================================================
    $pd_data = mysqli_query($con,"select * from `personneldetails` where `ApplicationId` = '$uid'");
    $pd_row = mysqli_fetch_row($pd_data);
    // Personal Details =======================================================================================================


    // Qualification Details =======================================================================================================
    $ug_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$uid' and `qualification` = 'Under Graduation'");
    $pg_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$uid' and `qualification` = 'Post Graduation'");
    $ph_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$uid' and `qualification` = 'Ph.D'");
    $ug_row = mysqli_fetch_row($ug_data);
    $pg_row = mysqli_fetch_row($pg_data);
    $ph_row = mysqli_fetch_row($ph_data);

    if($ug_row != null){
        $ucy_data = explode("<>",$ug_row[3]);
        $usp_data = explode("<>",$ug_row[4]);
        $uau_data = explode("<>",$ug_row[5]);
    }
    if($pg_row != null){
        $pcy_data = explode("<>",$pg_row[3]);
        $psp_data = explode("<>",$pg_row[4]);
        $pau_data = explode("<>",$pg_row[5]);
    }
    if($ph_row != null){
        $dcy_data = explode("<>",$ph_row[3]);
        $dsp_data = explode("<>",$ph_row[4]);
        $dau_data = explode("<>",$ph_row[5]);
    }
    // Qualification Details =======================================================================================================


    // Teaching Experience =======================================================================================================
    $td_data = mysqli_query($con,"select * from `teachingexp` where `ApplicationId` = '$uid'");
    $td_row = mysqli_fetch_row($td_data);

    $pr_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$uid' and `designation` = 'Professor' ");
    $ad_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$uid' and `designation` = 'Associate Professor' ");
    $sd_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$uid' and `designation` = 'Assistant Professor' ");
    $pr_row = mysqli_fetch_row($pr_data);
    $ad_row = mysqli_fetch_row($ad_data);
    $sd_row = mysqli_fetch_row($sd_data);

    if($pr_row != null ){
        $pda_data = explode("*",$pr_row[3]);
        $pto_data = explode("*",$pr_row[4]);
        $pun_data = explode("*",$pr_row[5]);
        $ppc_data = explode("*",$pr_row[6]);
    }
    if($ad_row != null ){
        $ada_data = explode("*",$ad_row[3]);
        $ato_data = explode("*",$ad_row[4]);
        $aun_data = explode("*",$ad_row[5]);
        $apc_data = explode("*",$ad_row[6]);
    }
    if($sd_row != null ){
        $sda_data = explode("*",$sd_row[3]);
        $sto_data = explode("*",$sd_row[4]);
        $sun_data = explode("*",$sd_row[5]);
        $spc_data = explode("*",$sd_row[5]);
    }
    // Teaching Experience =======================================================================================================


    // Research Experience =======================================================================================================
    $q1 = mysqli_query($con,"SELECT * FROM `researchexp` where `ApplicationId` = '$uid'");
    $row = mysqli_fetch_row($q1);
    // Research Experience =======================================================================================================


    // Administrative Positions =======================================================================================================
        $q1 = mysqli_query($con,"SELECT * FROM `administrativeexp` where `ApplicationId` = '$uid'");
        $arow = mysqli_fetch_row($q1);
        $pos_data = explode("<>",$arow[2]);
        $from_data = explode("<>",$arow[3]);
        $to_data = explode("<>",$arow[4]);

        $q2 = mysqli_query($con,"SELECT * FROM `cases` where `ApplicationId` = '$uid'");
        $crow = mysqli_fetch_row($q2);
        $case_data = explode("<>",$crow[2]);
        $cname_data = explode("<>",$crow[3]);
        $cstatus_data = explode("<>",$crow[4]);
        
        $q3 = mysqli_query($con,"SELECT * FROM `other` where `ApplicationId` = '$uid'");
        $orow = mysqli_fetch_row($q3);
    // Administrative Positions =======================================================================================================
?>