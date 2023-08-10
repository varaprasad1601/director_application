<?php
include("forms/db.php");
session_start();
if(isset($_SESSION['ApplicationId'])){ 
		header("location:forms/home.php");
}else{
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
    <link rel="icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="./forms/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->

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
        <?php include './header.php'; ?>
        <?php include './forms/navbar.php'; ?>
        <div class="col-md-12 d-flex justify-content-center align-items-center p-5 box">
            <div class="col-md-9 shadow rounded my-4 mt-4 d-flex align-items-center inner-box">
                <div class="col-md-6 logo d-flex justify-content-center align-items-center p-5">
                    <img src="rgukt.png" class="image" width="100">
                </div>
                <div class="col-md-6 px-5 py-5 inner-box">
                    <h2 style="font-family: Calibri;"><b>Registration</b></h2>
                    <label id="message" class="mb-2"></label>
                    <div class="f">
                        <div class="inputBox">
                            <input type="text" name="id" class="form-control" placeholder="Email Id" id="id">
                        </div>
						<div class="inputBox mt-3">
                            <input type="text" name="id" class="form-control" placeholder="Mobile Number" id="mobile">
                        </div>
                        <div class="inputBox  mt-3" style="margin-bottom: -8px !important;">
                            <input type="password" name="password" class="form-control" placeholder="Password" id="password">
                            <i class="fa fa-eye eye" id="pas_eye" onclick="pas_show()"></i>
                        </div>
				        <div class="inputBox  mt-0">
                            <input type="password" name="repassword" class="form-control" placeholder="Confirm Password" id="repassword">
                            <i class="fa fa-eye eye" id="con_eye" onclick="con_show()"></i>
                        </div>

                        <div class="inputBox my-2 mb-3">
                            <button type="button" style="width: 100%;" class="btn btn-outline-dark rounded-pill" onclick="submit()">Register</button>
                        </div>
                        <div class="inputBox my-0 d-flex justify-content-center align-items-center">
                            <label>Already have an Account? <a href="index.php" class="link">Login</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3"><?php include './forms/footer.php'; ?></div>
    </div>
    
</body>
<script src="jquery.min.js"></script>
<script type="text/javascript">

    password = document.getElementById("password");
    repassword = document.getElementById("repassword");
    pas_eye = document.getElementById("pas_eye");
    con_eye = document.getElementById("con_eye");

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

    function con_show(){
        if(repassword.type == "password"){
            repassword.type = "text";
            con_eye.removeAttribute("class","fa fa-eye eye")
            con_eye.setAttribute("class","fa fa-eye-slash eye")
        }else{
            repassword.type = "password";
            con_eye.removeAttribute("class","fa fa-eye-slash eye")
            con_eye.setAttribute("class","fa fa-eye eye")
        }
    }


    function submit(){
        var id=$('#id').val().trim();
        var password=$('#password').val().trim();
        var repassword=$('#repassword').val().trim();
        var mobile=$('#mobile').val().trim();
        if(id == ""){
            $('#message').html("<label style='color:red;'>* Enter Email ID</label>");
        }else if(id.length<9){
            $('#message').html("<label style='color:red;'>* Enter Valid Email ID</label>");
        }else if(mobile.length != 10){
            $('#message').html("<label style='color:red;'>* Enter Valid Mobile Number</label>");
        }else if(password == ""){
            $('#message').html("<label style='color:red;'>* Enter password</label>");
        }else if(password.length < 4){
            $('#message').html("<label style='color:red;'>* Password must contains minimum 4 characters</label>");
        }else if(repassword == ""){
            $('#message').html("<label style='color:red;'>* Enter Confirm Password</label>");
        }else if(password != repassword){
            $('#message').html("<label style='color:red;'>* Password not Matched</label>");
        }else{
            $.ajax({
            type:"POST",
            url:"reg_save.php",
            data:{u:id,p:password,m:mobile},
            success:function(data){
                if(data=="saved"){
                    alert("User Registerd Successfully..!!");
                    window.location="index.php";
                }else if(data == "Email Already Registered"){
                    $('#message').html("<label style='color:red;'>* Email Already Registered</label>");
                }
                else{
                    $('#message').html("<font style='color:green;'>"+data+"</font>");
                }
            }
        })

        }
    }
</script>
</html>

<?php
    }
?>