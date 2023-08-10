<?php 
    session_start();
    if(isset($_SESSION['u'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director Recruitment</title>
    <link rel="icon" href="./logo.png">
    <meta http-equiv="Cache-Control" content="no-store" />
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <script src="../jquery.min.js"></script>
    <style>
        ::-webkit-scrollbar{
            width: 7px;
            background:lightgray;
        }
        ::-webkit-scrollbar-thumb{
            background-color: black;
            border-radius: 50px;
        }
        body{
            width: 100% !important;
            /* overflow-x: hidden; */
        }
        .alert-box{
            width: max-content;
            position: fixed;
            top: 100px;
            right: 50px;
            background-color: green;
            z-index: 5;
            display: none;
        }
    </style>
</head>
<body>
    <div class="border rounded alert-box p-2 px-4 text-light" id="alert-box">
        <label id="alert-label"></label>
    </div>
<?php
    //-----------------TO KNOW WHICH TAB TO DISPLAY-------------------
    $u = $_SESSION['ApplicationId'];
    include "db.php";
    $tab = "";
    $q = mysqli_query($con,"SELECT `all_done` from `reg_dir` where `ApplicationId` = '$u'");
    $row = mysqli_fetch_row($q);
    $tab = $row[0];
    // echo $tab;
    if($tab == "tab7()"){
        include "navbar.php";
        include "check_points.php";
        include 'footer.php';
    }else{
        include "navbar.php";
        include "page_1.php";
        include "check_points.php";
        include 'footer.php';
    }
        
?>
<script>

    const alertvalue = localStorage.getItem('myParameterValue');
    console.log(alertvalue)
    console.log(alertvalue != null)
    if(alertvalue != null){
        console.log(alertvalue)
        alertbox(alertvalue)
    }

    function alertbox(value){
        localStorage.removeItem('myParameterValue')
        if(value.substr(-22) == "Submitted Successfully"){
            $("#alert-box").fadeIn(1000)
            document.getElementById("alert-label").innerText = "Saved Successfully";
            $("#alert-box").fadeOut(5000)
        }else if(value.substr(-20) == "Updated Successfully"){
            $("#alert-box").fadeIn(1000)
            document.getElementById("alert-label").innerText = "Updated Successfully";
            $("#alert-box").fadeOut(5000)
        }else{
            document.getElementById("alert-box").style.display = "none";
        }
    }
    
</script>
</body>
</html>
<?php
    }else{header("location:../index.php");}
?>