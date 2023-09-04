<html>
<head>
    <link rel="stylesheet" href="./forms/bootstrap/css/bootstrap.css">
</head>
<body>

<?php
if(isset($_GET['code']) && ($_GET['code'] =="1601/2811" || $_GET['code'] =="2811/1601")){
    $path = $_GET['code'];
    // Create an empty global array
    $global_array = array();

    // Include the database connection
    include "./forms/db.php";

    $pes_details = array();
    
    $ug_details_array = array();
    $pg_details_array = array();
    $phd_details_array = array();

    $t_details_array = array();

    $p_details_array = array();
    $a_details_array = array();
    $s_details_array = array();

    $all_details_array = array();

    $registered = array();

    $rg = mysqli_query($con, "SELECT * FROM `reg_dir` WHERE `all_done` = 'tab7()';");
    $sno = 1;
    while ($registered_data = mysqli_fetch_assoc($rg)) {


        // Personal Details ==================================================================
        $pq = mysqli_query($con, "SELECT * FROM `personneldetails` WHERE  ApplicationId = '{$registered_data['ApplicationId']}';");
        $pes_res = mysqli_fetch_row($pq);
        $personal_details[] = $pes_res;
        // Personal Details ==================================================================


        // Qualification Details ==================================================================
        $ugq = mysqli_query($con, "SELECT * FROM `qualifications` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `qualification` = 'Under Graduation';");
        $ug_res = mysqli_fetch_row($ugq);
        unset($ug_res[0]);
        unset($ug_res[1]);
        $ug_res[3] = str_replace("<>", "; ", $ug_res[3]);
        $ug_res[4] = str_replace("<>", "; ", $ug_res[4]);
        $ug_res[5] = str_replace("<>", "; ", $ug_res[5]);
        $ug_details[] = $ug_res;


        $pgq = mysqli_query($con, "SELECT * FROM `qualifications` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `qualification` = 'Post Graduation';");
        $pg_res = mysqli_fetch_row($pgq);
        unset($pg_res[0]);
        unset($pg_res[1]);
        $pg_res[3] = str_replace("<>", "; ", $pg_res[3]);
        $pg_res[4] = str_replace("<>", "; ", $pg_res[4]);
        $pg_res[5] = str_replace("<>", "; ", $pg_res[5]);
        $pg_details[] = $pg_res;

        $phdq = mysqli_query($con, "SELECT * FROM `qualifications` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `qualification` = 'Ph.D';");
        $phd_res = mysqli_fetch_row($phdq);
        unset($phd_res[0]);
        unset($phd_res[1]);
        $phd_res[3] = str_replace("<>", "; ", $phd_res[3]);
        $phd_res[4] = str_replace("<>", "; ", $phd_res[4]);
        $phd_res[5] = str_replace("<>", "; ", $phd_res[5]);
        $phd_details[] = $phd_res;
        // Qualification Details ==================================================================

        // Teaching Experience ==================================================================
        $tq = mysqli_query($con, "SELECT * FROM `teachingexp` WHERE ApplicationId = '{$registered_data['ApplicationId']}';");
        $t_res = mysqli_fetch_row($tq);
        unset($t_res[0]);
        unset($t_res[1]);
        $t_details[] = $t_res;
        // Teaching Experience ==================================================================

        // Working Experience ==================================================================
        $profq = mysqli_query($con, "SELECT * FROM `worked_universities` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `designation` = 'Professor';");
        $p_res = mysqli_fetch_row($profq);
        unset($p_res[1]);
        unset($p_res[0]);
        $p_res[3] = str_replace("*", "; ", $p_res[3]);
        $p_res[4] = str_replace("*", "; ", $p_res[4]);
        $p_res[5] = str_replace("*", "; ", $p_res[5]);
        $p_res[6] = str_replace("*", "; ", $p_res[6]);
        $p_details[] = $p_res;
        

        $assoq = mysqli_query($con, "SELECT * FROM `worked_universities` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `designation` = 'Associate Professor';");
        $a_res = mysqli_fetch_row($assoq);
        unset($a_res[0]);
        unset($a_res[1]);
        $a_res[3] = str_replace("*", "; ", $a_res[3]);
        $a_res[4] = str_replace("*", "; ", $a_res[4]);
        $a_res[5] = str_replace("*", "; ", $a_res[5]);
        $a_res[6] = str_replace("*", "; ", $a_res[6]);
        $a_details[] = $a_res;

        $assiq = mysqli_query($con, "SELECT * FROM `worked_universities` WHERE ApplicationId = '{$registered_data['ApplicationId']}' AND `designation` = 'Assistant Professor';");
        $s_res = mysqli_fetch_row($assiq);
        unset($s_res[0]);
        unset($s_res[1]);
        $s_res[3] = str_replace("*", "; ", $s_res[3]);
        $s_res[4] = str_replace("*", "; ", $s_res[4]);
        $s_res[5] = str_replace("*", "; ", $s_res[5]);
        $s_res[6] = str_replace("*", "; ", $s_res[6]);
        $s_details[] = $s_res;
        // Working Experience ==================================================================

        // All Details =========================================================================
        $allq = mysqli_query($con, "SELECT T1.*, T2.*, T3.*, T4.*, T5.* FROM researchexp T1, administrativeexp T2, cases T3, other T4, applied_campus T5  WHERE T1.ApplicationId = '{$registered_data['ApplicationId']}' AND T2.ApplicationId = '{$registered_data['ApplicationId']}' AND T3.ApplicationId = '{$registered_data['ApplicationId']}' AND T4.ApplicationId = '{$registered_data['ApplicationId']}' AND T5.ApplicationId = '{$registered_data['ApplicationId']}';");
        $all_res = mysqli_fetch_row($allq);
        unset($all_res[0]);
        unset($all_res[1]);
        unset($all_res[26]);
        unset($all_res[27]);
        unset($all_res[31]);
        unset($all_res[32]);
        unset($all_res[36]);
        unset($all_res[38]);
        $all_res[28] = str_replace('<>', "; ", $all_res[28]);
        $all_res[29] = str_replace('<>', "; ", $all_res[29]);
        $all_res[30] = str_replace('<>', "; ", $all_res[30]);
        $all_res[33] = str_replace('<>', "; ", $all_res[33]);
        $all_res[34] = str_replace('<>', "; ", $all_res[34]);
        $all_res[35] = str_replace('<>', "; ", $all_res[35]);
        $all_details[] = $all_res;
        // All Details =========================================================================
    }


    foreach ($personal_details as $pes_inner) {
        $pes_list = array_values($pes_inner);
        $pes_details[] = $pes_list;
    }

    foreach ($ug_details as $ug_inner){
        $ug_list = array_values($ug_inner);
        $ug_details_array[] = $ug_list;
    }

    foreach ($pg_details as $pg_inner){
        $pg_list = array_values($pg_inner);
        $pg_details_array[] = $pg_list;
    }

    foreach ($phd_details as $phd_inner){
        $phd_list = array_values($phd_inner);
        $phd_details_array[] = $phd_list;
    }

    foreach ($t_details as $t_inner){
        $t_list = array_values($t_inner);
        $t_details_array[] = $t_list;
    }

    foreach ($p_details as $p_inner){
        $p_list = array_values($p_inner);
        $p_details_array[] = $p_list;
    }

    foreach ($a_details as $a_inner){
        $a_list = array_values($a_inner);
        $a_details_array[] = $a_list;
    }

    foreach ($s_details as $s_inner){
        $s_list = array_values($s_inner);
        $s_details_array[] = $s_list;
    }

    foreach ($all_details as $all_inner){
        $all_list = array_values($all_inner);
        $all_details_array[] = $all_list;
    }

//     // Close the database connection
//     // mysqli_close($con);

//     // Combine all arrays into one global array
    for($i=0;$i<count($pes_details);$i++){
        $merged_array = array_merge($pes_details[$i], $ug_details_array[$i], $pg_details_array[$i], $phd_details_array[$i], $t_details_array[$i], $p_details_array[$i], $a_details_array[$i], $s_details_array[$i], $all_details_array[$i]);
        $merged_array[0] = $i+1;
        $global_array[] = $merged_array;
    };
    // print_r($global_array); echo '<br><br><br>';

    // Define the CSV file path
    $csvFilePath = "directorapp_data.csv";


    $columnHeadings = array(
        'S. No', 'Application Id', 'Name', 'Email Id', 'Mobile Number', 'Profile Picture', 'Date of Birth', 'Age', 'Gender', 'Social Status', 'Address', 'Present Designation', 'Department', 'Organisation Name',
        'Qualification', 'Year of Completion (Under Graduation)', 'Specialization (Under Graduation)', 'University (Under Graduation)',
        'Qualification', 'Year of Completion (Post Graduation)', 'Specialization (Post Graduation)', 'University (Post Graduation)',
        'Qualification', 'Year of Completion (Ph.D)', 'Specialization (Ph.D)', 'University (Ph.D)',
        'Teaching Experience', 'Service as Professor as on date', 'Leftover service before super annuation',
        'Designation', 'From (Professor)', 'To (Professor)', 'University Name (Professor)', 'Private College (Professor)',
        'Designation', 'From (Associate Professor)', 'To (Associate Professor)', 'University Name (Associate Professor)', 'Private College (Associate Professor)',
        'Designation', 'From (Assistant Professor)', 'To (Assistant Professor)', 'University Name (Assistant Professor)', 'Private College (Assistant Professor)',
        'Papers Published in Peer Reviewed Journals (National)', 'Papers Published in Peer Reviewed Journals (International)', 'Journals / Papers / Articles Published', 'No of Patents', 'Books with ISBN', 'Number of Research Projects completed (Major)', 'Number of Research Projects completed (Minor)', 'Funds Sanctioned/Utilized for Completed Research Projects (Major)', 'Funds Sanctioned/Utilized for Completed Research Projects (Minor)',
        'Number of Ongoing Research Projects (Major)', 'Number of Ongoing Research Projects (Minor)', 'Funds Sanctioned/Utilized for Ongoing Research Projects (Major)', 'Funds Sanctioned/Utilized for Ongoing Research Projects (Minor)', 'M.Phils / M.Tech Projects Guided', "Ph. D's Guided", 'Seminars/Conferences attended/Papers presented (National)', 'Seminars/Conferences attended/Papers presented (International)',
        'Details of Memberships in professional Socities/Bodies (National)', 'Details of Memberships in professional Socities/Bodies (International)', 'Number of Reputed Awards (State)', 'Number of Reputed Awards (National)', 'Number of Reputed Awards(International)', 'Number of Consultancy Projects', 'Amount of Consultancy Amount Generated', 
        'Administrative Position', 'From', 'To',
        'Type of Case', 'Name of the Case', 'Status of the Case',
        'Other Information', 'Applied Campus'
    );

    // Open the CSV file for writing
    $csvFile = fopen($csvFilePath, 'w');



//     // Write column headings as the first row in the CSV file
    fputcsv($csvFile, $columnHeadings);


//     // Iterate through the global array and write each row to the CSV file
    foreach ($global_array as $row) {
        fputcsv($csvFile, $row);
    }


//     // Close the CSV file
    fclose($csvFile);

//     // Output a message to the user indicating the CSV file has been created
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center flex-column align-items-center" style="height: 97vh;">
                <center><h2>CSV file created successfully at directorapp/directorapp_data.csv</h2></center>                
                <?php echo ($path == '2811/1601') ? '<a href="'.$csvFilePath.'" download><button class="btn btn-success">Download</button></a>' : '' ?>                
            </div>
        </div>
    </div>
    <?php
}else{
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 97vh;">
                <img src="./oops.png" alt="">
            </div>
        </div>
    </div>
    </body>
    </html>
    <?php
}
?>
