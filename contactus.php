<?php
session_start();
if(isset($_SESSION['ApplicationId'])){
	header("location:forms/home.php");
}
else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Rajiv Gandhi University of Knowledge Technologies"/>
  	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>RGUKT Director Recruitment</title>
    <meta name="keywords" content="RGUKT AP state university, Rajiv gandhi university of knowledge Technologies, RGUKT AP"/>
  	<meta name="author" content="">
  	<meta name="product" content="">
    <meta http-equiv="Cache-control" content="Cache-Control: max-age=31536000,public">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./forms/bootstrap/css/bootstrap.css">
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="jquery.min.js"></script>
    <style>
        ::-webkit-scrollbar{
            width: 5px;
            background:gray;
        }
        ::-webkit-scrollbar-thumb{
            background-color: black;
            border-radius: 50px;
        }
        .image{
            width: 70% !important;
        }
        label{
            font-size: 14px;  
            margin-bottom: 4px;
        }
        .form-control:focus{
            box-shadow: none;
            border: 1px solid gray;
        }
        .btn:focus{
            box-shadow: none;
        }
        .eye{
            position: relative !important;
            top: -31px !important;
            left: 92% !important;
        }
        @media screen and (max-width:600px) {
            .d-flex{
                flex-direction: column !important;
            }
            .logo{
                display: none !important;
            }
            .box{
                padding: 0px !important;
                width: 100% !important;
                height: 90vh !important;
                margin-top: -30px !important;
            }
            .inner-box{
                padding: 20px 0px !important;
                width: 90% !important;
                margin-top: 0px !important;
            }
            .checkbox{
                align-items: flex-start !important;
                justify-content: center !important;
            }
            .eye{
                position: relative !important;
                top: -29px !important;
                left: 90% !important;
            }
            body{
                overflow-x: hidden;
            }
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
        <?php include './header.php'; ?>
        <?php include './forms/navbar.php'; ?>
        <div class="col-md-12 d-flex justify-content-center align-items-center p-5 box">
                <div class="col-md-9 shadow rounded my-5 mt-5 d-flex align-items-center inner-box">
                    <div class="col-md-6 logo d-flex justify-content-center align-items-center p-5">
                        <img src="rgukt.png" class="image" width="100">
                    </div>
                    <div class="col-md-6 px-5 py-5 inner-box">
                        <h2 style="font-family: Calibri;"><b><u>CONTACT US</u></b></h2>
                        <label id="message"></label>
                        <div class="f">
                            <div class="inputBox">
                                Password related queries, send email to <b style='color:blue;'> xxxx@rgukt.in</b>
                            </div>
                            <div class="inputBox mt-3">
                                AnyOther queries, send email to <b style='color:blue;'>cao@rgukt.in</b>
                            </div>

                            <div class="inputBox mt-3">
                                Take me to: <a href="index.php" class="navbar-brand text-dark" style="font-family: Calibri;"><b><i style='color:green;'> Login page</i></b></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="mt-3"><?php include './forms/footer.php'; ?></div>
    </div>
</body>
</html>
<?php

    }?>