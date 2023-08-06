<?php
include("./forms/db.php");
session_start();
if(isset($_SESSION['type']))
{ 
	if(($_SESSION['type']=="home"))
	{
		header("location:home.php");
	}
	else
    {
        header("location:index.php");
    }
}
else
{
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
            <div class="col-md-9 shadow rounded my-5 mt-4 d-flex align-items-center inner-box">
                <div class="col-md-6 logo d-flex justify-content-center align-items-center p-5">
                    <img src="rgukt.png" class="image" width="100">
                </div>
                <div class="col-md-6 px-5 py-5 inner-box">
                    <h2 style="font-family: Calibri;"><b>Forgot Password</b></h2>
                    <label id="message"></label>
                    <div class="f">
                        <div id="email_div" class="mb-3">
                            <div class="inputBox">
                                <input type="text" name="id" placeholder="Email id" class="form-control" id="id" required>
                            </div>
                            <div class="inputBox mt-4">
                                <button type="button" style="width: 100%;" class="btn btn-outline-dark rounded-pill" onclick="send_otp()">Send OTP</button>
                            </div>
                        </div>

                        <div id="otp_div" style="display: none;">
                            <div class="inputBox">
                                <input type="text" name="otp" placeholder="OTP" class="form-control" id="otp" required>
                            </div>
                            <div class="inputBox mt-3" style="margin-bottom: -8px !important;">
                                <input type="password" name="newpassword" placeholder="New Password" class="form-control" id="newpassword" required>
                                <i class="fa fa-eye eye" id="pas_eye" onclick="pas_show()"></i>
                            </div>
                            <div class="inputBox mt-0">
                            <input type="password" name="repassword" placeholder="Confirm New Password" class="form-control" id="repassword" required>
                            <i class="fa fa-eye eye" id="con_eye" onclick="con_show()"></i>
                            </div>
                            <div class="inputBox my-2 mb-3">
                                <button id="login" type="button" style="width: 100%;" class="btn btn-outline-dark rounded-pill" onclick="submit()">Submit</button>
                            </div>
                        </div>

                        <div class="inputBox my-0 d-flex justify-content-center align-items-center">
                            <label>Dont have an Account? <a href="registration.php" class="link">Register</a></label>
                        </div>
                        <div class="inputBox my-0 d-flex justify-content-center align-items-center">
                            <label><a href="index.php" class="link">Login</a></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3"><?php include './forms/footer.php'; ?></div>
    </div>    
</body>
<script src="jquery.min.js"></script>
<!-- Automatic show popup after 2 sec  -->
<script type="text/javascript">
    newpassword = document.getElementById("newpassword");
    repassword = document.getElementById("repassword");
    pas_eye = document.getElementById("pas_eye");
    con_eye = document.getElementById("con_eye");


    function pas_show(){
        if(newpassword.type == "password"){
            newpassword.type = "text";
            pas_eye.removeAttribute("class","fa fa-eye eye")
            pas_eye.setAttribute("class","fa fa-eye-slash eye")
        }else{
            newpassword.type = "password";
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

    function send_otp(){
        var id = $("#id").val();
        if(id.length > 0){
            $.ajax({
                type:"POST",
                url:"send_otp.php",
                data:{u:id},
                success:function(data){
                    if(data=="success")
                    {
                        alert("OTP Send Successfully")
                        document.getElementById("email_div").style.display = "none";
                        document.getElementById("otp_div").style.display = "contents";
                    }
                    else 
                    {
                        $('#message').html("<p style='color:red;font-size:14px;'>* "+data+"</p>");
                    }

                }
            });
        }else{
            $('#message').html("<p style='color:red;font-size:14px;'>* Enter Email Id</p>");
        }
    }

    function submit(){
        var id=$('#id').val();
        var otp=$('#otp').val();
        var newpassword=$('#newpassword').val();
        
        if(id=="")
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Enter Email Id </p>");   
        }
        else if(otp == "")
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Enter OTP</p>");
        }
        else if(otp.length<6)
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Invalid OTP</p>");
        }
        else if(newpassword.value == "")
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Enter New Password</p>");
        }
        else if(newpassword.length < 4)
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Password must contains minimum 4 characters</p>");
        }
        else if(newpassword.length > 8)
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Password contains maximum 8 characters</p>");
        }
        else if(repassword.value == "")
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Enter Confirm Password</p>");
        }
        else if(newpassword != repassword.value)
        {
            $('#message').html("<p style='color:red;font-size:14px;'>* Password not Matched</p>");
        }
        else
        {  
            var datastring="id="+id+"&otp="+otp+"&newpassword="+newpassword+"&repassword="+repassword;
            $.ajax({
            type:"POST",
            url:"forgotpage.php",
            data:datastring,
            success:function(data){
                if(data=="success")
                {
                    alert("Password Changed Successfully")
                    $('#message').html("<p style='color:#08f757;font-size:14px;'>Password Changed Successfully..!<p>");
                }
                else 
                {
                    $('#message').html("<p style='color:red;font-size:14px;'>* Enter valid Credentials<p>");
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