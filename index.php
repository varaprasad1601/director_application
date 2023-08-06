<!--<html>-->
<!--    <body bgcolor="">-->
<!--        <center><h1>Website Under Maintainance</h1>-->
<!--                <h3>Check back after 1 hour</h3>-->
<!--                <h6>Regret for the inconvinience</h6></center>-->
<!--    </body>-->
<!--</html>-->
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
        @media screen and (max-width:400px) {
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
                padding: 20px 5px !important;
                width: 93% !important;
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
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <?php include './forms/navbar.php'; ?>
        <div class="col-md-12 d-flex justify-content-center align-items-center p-5 box">
        <div class="col-md-9 shadow rounded my-5 mt-5 d-flex align-items-center inner-box">
            <div class="col-md-6 logo d-flex justify-content-center align-items-center p-5">
                <img src="rgukt.png" class="image" width="100">
            </div>
            <div class="col-md-6 px-5 py-5 inner-box">
                <h2 style="font-family: Calibri;"><b>Login</b></h2>
                <label id="message"></label>
                <div class="f">
                    <div class="inputBox">
                        <input type="email" name="u" class="form-control" placeholder="email id" id="id" required>
                    </div>
                    <div class="inputBox mt-3">
                        <input type="password" name="p" placeholder="password" class="form-control" id="password" required>
                        <i class="fa fa-eye eye" id="pas_eye" onclick="pas_show()"></i>
                    </div>
                    <div class="inputBox my-2 mb-3">
                        <button id="login" type="button" style="width: 100%;" class="btn btn-outline-dark rounded-pill">Login</button>
                    </div>
                    <div class="inputBox my-0 d-flex justify-content-center align-items-center">
                        <label>Dont have an Account? <a href="registration.php" class="link">Register</a></label>
                    </div>
                    <div class="inputBox my-0 d-flex justify-content-center align-items-center">
                        <label><a href="forgot1.php" class="link">forgot password?</a></label>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="mt-3"><?php include './forms/footer.php'; ?></div>
    </div>
</body>
<script type="text/javascript">
    function pas_show(){
        if(password.type == "password"){
            password.type = "text";
            pas_eye.removeAttribute("class","fa fa-eye eye")
            pas_eye.setAttribute("class","fa fa-eye-slash eye")
        }else{
            password.type = "password";
            pas_eye.removeAttribute("class","fa fa-eye-slash eye")
            pas_eye.setAttribute("class","fa fa-eye eye")
        }
    }

    $(document).ready(function(){
        $("#login").click(function(){
            var id=$('#id').val();
            var password=$('#password').val();
            $.ajax({
                type:"POST",
                url:"authentication.php",
                data:{u:id,p:password},
                beforeSend:function(){
                    $('#message').html("<p style='color:blue;font-size:14px;'>processing...<p>");
                },
                success:function(data){
                    //alert(data);
                    if(data=="S"){
                        $('#message').html("<p style='color:green;font-size:14px;'>Login Success..!!<p>");
                        setTimeout(location.reload(),10000);
                    }else{
                        $('#message').html("<p style='color:red;font-size:14px;'>Invalid Credentials..!!<p>");
                    }
                }
            });
        })
    });
    </script>
</html>

<?php
    }
?>