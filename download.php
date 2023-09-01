<html>
<head>
    <link rel="stylesheet" href="./forms/bootstrap/css/bootstrap.css">
</head>
<body>

<?php
if(isset($_GET['code']) && $_GET['code'] =="1601/2811"){
    // Create an empty global array
    $global_array = array();

    // Include the database connection
    include "./forms/db.php";

    // Personal Details ==================================================================
    $pes_details = array();
    $pq = mysqli_query($con, "SELECT T1.* FROM `reg_dir` T0, `personneldetails` T1 WHERE T0.`all_done` = 'tab7()' AND T0.ApplicationId = T1.ApplicationId;");
    while ($personal_details = mysqli_fetch_assoc($pq)) {
        $pes_res[] = $personal_details;
    }
    foreach ($pes_res as $pes_inner) {
        $pes_list = array_values($pes_inner);
        $pes_details[] = $pes_list;
    }
    // Personal Details ==================================================================

    // Qualification Details ==================================================================
    $ug_details_array = array();
    $ugq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `qualifications` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`qualification` = 'Under Graduation';");
    while ($ug_details = mysqli_fetch_assoc($ugq)) {
        // Remove Serial Number and Application ID from the array
        unset($ug_details['sno']);
        unset($ug_details['ApplicationId']);
        $ug_details['year'] = str_replace("<>", "; ", $ug_details['year']);
        $ug_details['specialization'] = str_replace("<>", "; ", $ug_details['specialization']);
        $ug_details['university'] = str_replace("<>", "; ", $ug_details['university']);
        $ug_res[] = $ug_details;
    }
    foreach ($ug_res as $ug_inner){
        $ug_list = array_values($ug_inner);
        $ug_details_array[] = $ug_list;
    }

    $pg_details_array = array();
    $pgq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `qualifications` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`qualification` = 'Post Graduation';");
    while ($pg_details = mysqli_fetch_assoc($pgq)) {
        // Remove Serial Number and Application ID from the array
        unset($pg_details['sno']);
        unset($pg_details['ApplicationId']);
        $pg_details['year'] = str_replace("<>", "; ", $pg_details['year']);
        $pg_details['specialization'] = str_replace("<>", "; ", $pg_details['specialization']);
        $pg_details['university'] = str_replace("<>", "; ", $pg_details['university']);
        $pg_res[] = $pg_details;
    }
    foreach ($pg_res as $pg_inner){
        $pg_list = array_values($pg_inner);
        $pg_details_array[] = $pg_list;
    }

    $phd_details_array = array();
    $phdq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `qualifications` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`qualification` = 'Ph.D';");
    while ($phd_details = mysqli_fetch_assoc($phdq)) {
        // Remove Serial Number and Application ID from the array
        unset($phd_details['sno']);
        unset($phd_details['ApplicationId']);
        $phd_details['year'] = str_replace("<>", "; ", $phd_details['year']);
        $phd_details['specialization'] = str_replace("<>", "; ", $phd_details['specialization']);
        $phd_details['university'] = str_replace("<>", "; ", $phd_details['university']);
        $phd_res[] = $phd_details;
    }
    foreach ($phd_res as $phd_inner){
        $phd_list = array_values($phd_inner);
        $phd_details_array[] = $phd_list;
    }
    // Qualification Details ==================================================================

    // Teaching Experience ==================================================================
    $t_details_array = array();
    $pq = mysqli_query($con, "SELECT T1.* FROM `reg_dir` T0, `teachingexp` T1 WHERE T0.`all_done` = 'tab7()' AND T0.ApplicationId = T1.ApplicationId;");
    while ($teaching_exp = mysqli_fetch_assoc($pq)) {
        // Remove Serial Number and Application ID from the array
        unset($teaching_exp['sno']);
        unset($teaching_exp['ApplicationId']);
        $t_res[] = $teaching_exp;
    }
    foreach ($t_res as $t_inner){
        $t_list = array_values($t_inner);
        $t_details_array[] = $t_list;
    }
    // Teaching Experience ==================================================================

    // Working Experience ==================================================================
    $p_details_array = array();
    $profq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `worked_universities` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`designation` = 'Professor';");
    while ($prof_details = mysqli_fetch_assoc($profq)) {
        // Remove Serial Number and Application ID from the array
        unset($prof_details['sno']);
        unset($prof_details['ApplicationId']);
        $prof_details['dateOfAppointment'] = str_replace("*", "; ", $prof_details['dateOfAppointment']);
        $prof_details['upto'] = str_replace("*", "; ", $prof_details['upto']);
        $prof_details['university'] = str_replace("*", "; ", $prof_details['university']);
        $prof_details['privateCollege'] = str_replace("*", "; ", $prof_details['privateCollege']);
        $p_res[] = $prof_details;
    }
    foreach ($p_res as $p_inner){
        $p_list = array_values($p_inner);
        $p_details_array[] = $p_list;
    }

    $a_details_array = array();
    $assoq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `worked_universities` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`designation` = 'Associate Professor';");
    while ($asso_details = mysqli_fetch_assoc($assoq)) {
        // Remove Serial Number and Application ID from the array
        unset($asso_details['sno']);
        unset($asso_details['ApplicationId']);
        $asso_details['dateOfAppointment'] = str_replace("*", "; ", $asso_details['dateOfAppointment']);
        $asso_details['upto'] = str_replace("*", "; ", $asso_details['upto']);
        $asso_details['university'] = str_replace("*", "; ", $asso_details['university']);
        $asso_details['privateCollege'] = str_replace("*", "; ", $asso_details['privateCollege']);
        $a_res[] = $asso_details;
    }
    foreach ($a_res as $a_inner){
        $a_list = array_values($a_inner);
        $a_details_array[] = $a_list;
    }

    $s_details_array = array();
    $assiq = mysqli_query($con, "SELECT t1.* FROM `reg_dir` t0, `worked_universities` t1 WHERE t0.`all_done` = 'tab7()' AND t1.ApplicationId = t0.ApplicationId AND t1.`designation` = 'Assistant Professor';");
    while ($assi_details = mysqli_fetch_assoc($assiq)) {
        // Remove Serial Number and Application ID from the array
        unset($assi_details['sno']);
        unset($assi_details['ApplicationId']);
        $assi_details['dateOfAppointment'] = str_replace("*", "; ", $assi_details['dateOfAppointment']);
        $assi_details['upto'] = str_replace("*", "; ", $assi_details['upto']);
        $assi_details['university'] = str_replace("*", "; ", $assi_details['university']);
        $assi_details['privateCollege'] = str_replace("*", "; ", $assi_details['privateCollege']);
        $s_res[] = $assi_details;
    }
    foreach ($s_res as $s_inner){
        $s_list = array_values($s_inner);
        $s_details_array[] = $s_list;
    }
    // Working Experience ==================================================================

    // All Details ==================================================================
    $all_details_array = array();
    $allq = mysqli_query($con, "SELECT T1.*, T2.*, T3.*, T4.*, T5.* FROM `reg_dir` T0, researchexp T1, administrativeexp T2, cases T3, other T4, applied_campus T5  WHERE T0.`all_done` = 'tab7()' AND T0.ApplicationId = T5.ApplicationId AND T1.ApplicationId = T5.ApplicationId AND T2.ApplicationId = T5.ApplicationId AND T3.ApplicationId = T5.ApplicationId AND T4.ApplicationId = T5.ApplicationId;");
    while ($all_details = mysqli_fetch_assoc($allq)) {
        // Remove Serial Number and Application ID from the array
        unset($all_details['sno']);
        unset($all_details['ApplicationId']);
        $all_details["position"] = str_replace('<>', "; ", $all_details['position']);
        $all_details["fromDate"] = str_replace('<>', "; ", $all_details['fromDate']);
        $all_details["toDate"] = str_replace('<>', "; ", $all_details['toDate']);
        $all_details["typeOf_case"] = str_replace('<>', "; ", $all_details['typeOf_case']);
        $all_details["CaseName"] = str_replace('<>', "; ", $all_details['CaseName']);
        $all_details["CaseStatus"] = str_replace('<>', "; ", $all_details['CaseStatus']);
        $all_res[] = $all_details;
    }
    foreach ($all_res as $all_inner){
        $all_list = array_values($all_inner);
        $all_details_array[] = $all_list;
    }
    // All Details ==================================================================

    // Close the database connection
    mysqli_close($con);

    // Combine all arrays into one global array
    for($i=0;$i<count($pes_details);$i++){
        
        $merged_array = array_merge($pes_details[$i], $ug_details_array[$i], $pg_details_array[$i], $phd_details_array[$i], $t_details_array[$i], $p_details_array[$i], $a_details_array[$i], $s_details_array[$i], $all_details_array[$i]);
        $global_array[] = $merged_array;
    };
    // print_r($global_array);

    // Define the CSV file path
    $csvFilePath = 'directorapp_data.csv';

    // Open the CSV file for writing
    $csvFile = fopen($csvFilePath, 'w');


    $columnHeadings = array(
        'S. No', 'Application Id', 'Name', 'Email Id', 'Mobile NUmber', 'Profile Picture', 'Date of Birth', 'Age', 'Gender', 'Social Status', 'Address', 'Present Designation', 'Department', 'Organisation Name',
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

    // Write column headings as the first row in the CSV file
    fputcsv($csvFile, $columnHeadings);


    // Iterate through the global array and write each row to the CSV file
    foreach ($global_array as $row) {
        fputcsv($csvFile, $row);
    }

    // Close the CSV file
    fclose($csvFile);

    // Output a message to the user indicating the CSV file has been created
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex justify-content-center align-items-center" style="height: 97vh;">
                <center><h2>CSV file created successfully at directorapp/<?php echo $csvFilePath ?></h2></center>
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
