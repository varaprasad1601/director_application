<?php
    if(isset($_GET['go']) && $_GET['go'] =="yes"){
        session_start();
        include "./forms/db.php";    
        mysqli_query($con,"truncate table `worked_universities`");
        mysqli_query($con,"truncate table `teachingexp`");
        mysqli_query($con,"truncate TABLE`researchexp`");
        mysqli_query($con,"truncate TABLE`reg_dir`");
        mysqli_query($con,"truncate TABLE`qualifications`");
        mysqli_query($con,"truncate table`personneldetails`");
        mysqli_query($con,"truncate table `other`");
        mysqli_query($con,"truncate table `cases`");
        mysqli_query($con,"truncate table`applied_campus`");
        mysqli_query($con,"truncate table `administrativeexp`");
        echo "Done Daddy!!";
        mysqli_close($con);
    }else{
        echo "GO Play with children..!!";
    }
    
?>  