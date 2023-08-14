<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
<style>
    @media screen and (max-width:400px){
        .navbar-brand{
            margin: 0px !important;
        }
    }
</style>
</head>
<?php  if(isset($_SESSION['ApplicationId'])){ ?>
    <body>
        <div class="container-fluid">
        <div class="row">
            <div class="navbar bg-light shadow" id="nav_bar">
                <a href="#" class="navbar-brand text-dark ms-5" style="font-family: Calibri;"><b>RGUKT Director Recruitment</b></a>
                <a href="#" class="navbar-brand text-dark  ms-5" style="font-family: Calibri;align:right"><b><font style='color:red;'>Any Queries, Email to:</font><i style='color:green;'> cao@rgukt.in</i></b></a>
                <div style="padding:0 2% 0 0;" class="d-flex align-items-center"><?php echo "<span style='padding:0 2% 0 0;'>".$_SESSION['u']."</span>";?><a style="color:red;" class="ms-3" href="../logout.php" title="Logout"><i class="bi bi-box-arrow-right" style="font-size: 25px; color:red;"></i></a> </div>
            </div>
        </div>
        </div>
    </body>
<?php
    }else{ ?>
        <body>
        <div class="container-fluid">
        <div class="row">
            <div class="navbar bg-light shadow">
                <a href="index.php" class="navbar-brand text-dark ms-5" style="font-family: Calibri;"><b>RGUKT Director Recruitment</b></a>
                <a href="contactus.php" class="navbar-brand text-dark  ms-5" style="font-family: Calibri;align:right"><b><font style='color:red;'>Any Queries:</font> Contact Us</b></a>
            </div>
        </div>
        </div>
        </body>
    <?php }
?>