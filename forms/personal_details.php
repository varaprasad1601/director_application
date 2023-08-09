<?php
    if(isset($_SESSION['ApplicationId'])){
        $pid = $_SESSION['ApplicationId'];
        $pd_data = mysqli_query($con,"select * from `personneldetails` where `ApplicationId` = '$pid'");
        $pd_row = mysqli_fetch_row($pd_data);

        $stage_data = mysqli_query($con,"select `stage` from `reg_dir` where `ApplicationId` = '$pid'");
        $stage = mysqli_fetch_row($stage_data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../jquery.min.js"></script>
    <script>
        // Name ============================================================================
        function name_function(){
            applicant_name.addEventListener('change',name_function);
            var regex = /^[a-z A-Z]+$/;
            if (applicant_name.value.length == 0){
                applicant_name.style.border = "1px solid red";
                $("#applicant_name").focus();
                fields("Enter Name");
                return false
            }
            else{
                if (!regex.test(applicant_name.value.trim())){
                    applicant_name.style.border = "1px solid red";
                    fields("Enter Valid Name");
                    return false
                }
                else{
                    applicant_name.style.border = "1px solid lightgray";
                }
            }
        };
        // Name ============================================================================


        // Mobile Number ====================================================================
        function mobile_function(){
            applicant_name.addEventListener('change',mobile_function);
            var indreg=/^[6-9]\d{9}$/;
            if(mobile_number.value.length == 0){
                mobile_number.style.border = "1px solid red";
                fields("Enter Valid Mobile Number")
                return false;
            }else{
                if (indreg.test(mobile_number.value)){
                    mobile_number.style.border = "1px solid lightgray";
                }
                else{
                    mobile_number.style.border = "1px solid red";
                    fields("Enter Valid Mobile Number")
                    return false;
                }
            }
        };
        // Mobile Number ====================================================================


        // Photo ===========================================================================
        function photo_function(){
            photo.addEventListener('change',photo_function);
            if (photo.value.length == 0){
                photo.style.border = "1px solid red";
                fields("Upload Photo");
                return false
            }
            else{
                pic_size = ((photo.files[0].size)/1024).toFixed(2)
                if(pic_size<=1024 & ((photo.files[0].type)=='image/png' | (photo.files[0].type=='image/jpg') | (photo.files[0].type=='image/jpeg'))){
                    photo.style.border = "1px solid lightgray";
                }
                else{
                    if(pic_size > 1024 & ((photo.files[0].type)=='image/png' | (photo.files[0].type=='image/jpg') | (photo.files[0].type=='image/jpeg'))){
                        photo.style.border = "1px solid red";
                        fields("Image Size should be Less than 1Mb");
                        return false
                    }else{
                        photo.style.border = "1px solid red";
                        fields("Format not supported Upload .png .jpg .jpeg");
                        return false
                    }
                }
            }
        };
        // Photo ===========================================================================


        // Date of Birth =====================================================================
        function date_of_birth(){
            applicant_name.addEventListener('change',date_of_birth);
            if (dob.value.length == 0){
                dob.style.border = "1px solid red";
                fields("Enter Date of Birth");
                return false
            }
            else{
                presentdate = new Date()
                newdate = new Date(dob.value)
                var [yer,mon,dat] = dob.value.split("-");
                if(presentdate.getTime() < newdate.getTime()){
                    dob.style.border = "1px solid red";
                    fields("Enter Valid Date of Birth")
                    return false
                }
                else{
                    dob.style.border = "1px solid lightgray";
                    calculate_age()
                }
            }
        };
        // Date of Birth =====================================================================


        // Calculate Age =====================================================================
        function calculate_age(){
            now = new Date()
            newdate = new Date(dob.value)
            res = now.getFullYear() - newdate.getFullYear();

            if (now.getMonth() < newdate.getMonth() || (now.getMonth() === newdate.getMonth() && now.getDate() < newdate.getDate())){
                res--;
            }
            age.value = res
        };
        // Calculate Age =====================================================================
        

        // Gender ===========================================================================
        function gender_function(){
            if (male.checked == false & female.checked == false){
                fields("Select Gender")
                return false
            }
        };
        // Gender ===========================================================================

        
        // Category ==========================================================================
        function category_function(){
            category.addEventListener('change',category_function);
            var regex = /^[a-z A-Z,\-_()]+$/;
            if(category.value.length == 0){
                category.style.border = "1px solid red";
                fields("Enter Social Status")
                return false
            }
            else{
                if(!regex.test(category.value.trim())){
                    category.style.border = "1px solid red";
                    fields("Only these (Alphabets, '-' '_' '(s' ')' and ',') are allowed")
                    return false
                }
                else{
                    category.style.border = "1px solid lightgray";
                }
            }
        };
        // Category ===========================================================================


        // Address ============================================================================
        function address_function(){
            address.addEventListener('change',address_function);
            if (address.value.length == 0){
                address.style.border = "1px solid red";
                fields("Enter Address")
                return false
            }
            else{
                address.style.border = "1px solid lightgray";
            }
        };
        // Address ==============================================================================


        // Designation ===========================================================================
        function designation_function(){
            p_designation.addEventListener('change',designation_function);
            var regex = /^[a-z A-Z,\-_]+$/;
            if(p_designation.value.length == 0){
                p_designation.style.border = "1px solid red";
                fields("Enter Designation")
                return false
            }
            else{
                if(!regex.test(p_designation.value.trim())){
                    p_designation.style.border = "1px solid red";
                    fields("Enter Valid Designation")
                    return false
                }
                else{
                    p_designation.style.border = "1px solid lightgray";
                }
            }
        };
        // Designation ============================================================================


        // Department ============================================================================
        function department_function(){
            department.addEventListener('change',department_function);
            var regex = /^[a-z A-Z,\-_]+$/;
            if(department.value.length == 0){
                department.style.border = "1px solid red";
                fields("Enter Department")
                return false
            }
            else{
                if(!regex.test(department.value.trim())){
                    department.style.border = "1px solid red";
                    fields("Enter Valid Department")
                    return false
                }
                else{
                    department.style.border = "1px solid lightgray";
                }
            }
        };
        // Department ============================================================================


        // University ==============================================================================
        function univer_function(){
            univer.addEventListener('change',univer_function);
            var regex = /^[a-z A-Z,\-_]+$/;
            if(univer.value.length == 0){
                univer.style.border = "1px solid red"
                fields("Enter University Name")
                return false
            }
            else{
                if(!regex.test(univer.value.trim())){
                    univer.style.border = "1px solid red"
                    fields("Enter Valid University Name")
                    return false
                }
                else{
                    univer.style.border = "1px solid lightgray"
                }
            }
        }
        // University ==============================================================================


        // agree ==================================================================================
        function agree_function(){
            if(agree.checked){
            }
            else{
                fields("Select Agree")
                msg.innerHTML = "* Required field"
                return false
            }
        };
        // agree ==================================================================================


        // Validation ==============================================================================
        function pvalidation(){
            if(name_function() == false){return false;}
            if(mobile_function() == false){return false;}
            <?php if($pd_row == null){ ?>
                if(photo_function() == false){return false;}
            <?php } ?>
            if(date_of_birth() == false){return false;}
            if(gender_function() == false){return false;}
            if(category_function() == false){return false;}
            if(address_function() == false){return false;}
            if(designation_function() == false){return false;}
            if(department_function() == false){return false;}
            if(univer_function() == false){return false;}
            if(agree_function() == false){return false;}
            else{return true;}
        };
        // Validation ================================================================================


        // Alert ====================================================================================
        function fields(msg){
            alert(msg)
        };
        // Alert ====================================================================================


        // Enable ==================================================================================
        function penable(){
            document.getElementById("p_ebtn").style.display = "none";
            document.getElementById("p_ubtn").style.display = "block";
            applicant_name.removeAttribute("disabled");
            email.removeAttribute("disabled");
            mobile_number.removeAttribute("disabled");
            photo.removeAttribute("disabled");
            dob.removeAttribute("disabled");
            male.removeAttribute("disabled");
            female.removeAttribute("disabled");
            category.removeAttribute("disabled");
            address.removeAttribute("disabled");
            p_designation.removeAttribute("disabled");
            department.removeAttribute("disabled");
            univer.removeAttribute("disabled");
            agree.removeAttribute("disabled");
            agree.removeAttribute("checked");
        }
        // Enable ==================================================================================
        
    </script>
    <!-- Java Script -->
</head>
<body>
    <!-- Tab - 1 -->
    <div class="col-md-10 box">
        <h3 class="mt-2">Personal Details</h3>
        <hr>
        <label style="font-family: 'Calibri' !important; font-size: 15px; font-weight: 600; text-align: right;" class="mt-1">Application Id: <span style="color:red;"><?php echo $_SESSION['ApplicationId'];?></span></label>
        <!-- <form action="home.php" method="post" onsubmit="return pvalidation()"> -->
        <form method="post" id="pd_form" enctype="multipart/form-data" autocomplete="on">
            <div class="form-group d-flex justify-content-between mt-2">
                <div class="col-md-5">
                    <label>Name of the Applicant</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="applicant_name" name="applicant_name" <?php if($pd_row != null){echo 'value="'. $pd_row[2]. '" disabled';}?>>
                </div>
                <div class="col-md-5">
                    <label>Email Id</label> <label class="err_msg" id="msg"> * </label>
                    <input type="email" class="form-control" id="email" name="email" readonly <?php echo 'value="'. $_SESSION['u'] .'"'?>>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Mobile Number</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="mobile_number" name="mobile_number" <?php if($pd_row != null){echo 'value="'. $pd_row[4]. '" disabled';}?>>
                </div>
                <div class="col-md-5">
                    <label>Photo</label> <label class="err_msg" id="msg"> * </label>
                    <input type="file" class="form-control" size="1024" id="photo" name="photo" accept="image/*" <?php if($pd_row != null){echo 'disabled';}?>>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Date of Birth</label> <label class="err_msg" id="msg"> * </label>
                    <input type="date" class="form-control" id="dob" name="dob" onblur="date_of_birth()" <?php if($pd_row != null){echo 'value="'. $pd_row[6]. '" disabled';}?>>
                </div>
                <div class="col-md-5">
                    <label>Age</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" id="age" name="age" readonly <?php if($pd_row != null){echo 'value="'. $pd_row[7].'"';}?>>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Gender</label> <label class="err_msg" id="msg"> * </label><br>
                    <div class="d-flex justify-content-between" style="width: 50%;">
                        <label><input type="radio" name="gender" id="male" value="Male" <?php echo ($pd_row != null && $pd_row[8] == "Male") ? "checked" : ""; ?>> Male</label>
                        <label><input type="radio" name="gender" id="female" value="Female" <?php echo ($pd_row != null && $pd_row[8] == "Female") ? "checked" : ""; ?>> Female</label>
                    </div>
                </div>
                <div class="col-md-5">
                    <label>Social Status</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="social_status" name="category" <?php if($pd_row != null){echo 'value="'. $pd_row[9]. '" disabled';}?>>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-12">
                    <label>Address</label> <label class="err_msg" id="msg"> * </label>
                    <textarea class="form-control" id="address" name="address" <?php if($pd_row != null){echo 'disabled';}?>><?php if($pd_row != null){echo $pd_row[10];}?></textarea>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Present Designation</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="p_designation" name="p_designation" <?php if($pd_row != null){echo 'value="'. $pd_row[11]. '" disabled';}?>>
                </div>
                <div class="col-md-5">
                    <label>Department</label> <label class="err_msg" id="msg" > * </label>
                    <input type="text" class="form-control" id="department" name="department" <?php if($pd_row != null){echo 'value="'. $pd_row[12]. '" disabled';}?>>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>University Name</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="univer" name="univer" <?php if($pd_row != null){echo 'value="'. $pd_row[13]. '" disabled';}?>>
                </div>
            </div>

            <div class="form-group mt-4">
            <?php if($pd_row != null){
                    echo '<input type="checkbox" id="agree" checked disabled>&nbsp; <label for="agree">I Confirm to the above details</label> <label class="err_msg" id="agreemsg"> * </label>';
                }else{
                    echo '<input type="checkbox" id="agree"> <label for="agree">I Confirm to the above details</label><label class="err_msg" id="agreemsg"> * </label>';
                }?>
            </div>

            <!-- <input type="text" value="tab2()" name="tab" hidden> -->
            <div class="form-group d-flex justify-content-end my-4">
            <?php if($pd_row != null){
                echo '<input type="button" class="btn btn-outline-primary rounded-pill me-4" id="p_ebtn" style="width:175px;" value="Edit" onclick="penable()">';
                echo '<input type="submit" class="btn btn-outline-dark rounded-pill me-4" id="p_ubtn" style="width:175px; display:none;" value="Update & Next">';
                if($tab == "tab6()"){
                    echo '<input type="button" class="btn btn-outline-warning rounded-pill space" style="width:175px;" value="Preview" onclick="preview()">';
                }
                }else{
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill" style="width:175px;" value="Save & Next">';
                }?>
            </div>
        </form>
    </div>
    <script>
        var applicant_name = document.getElementById("applicant_name");
        var mobile_number = document.getElementById("mobile_number");
        var photo = document.getElementById("photo");
        var dob = document.getElementById("dob");
        var age = document.getElementById("age");
        var male = document.getElementById("male");
        var female = document.getElementById("female");
        var category = document.getElementById("social_status");
        var address = document.getElementById("address");
        var p_designation = document.getElementById("p_designation");
        var department = document.getElementById("department");
        var univer = document.getElementById("univer");

        var agree = document.getElementById("agree");
        var msg = document.getElementById("agreemsg");



        $(document).ready(function (e) {
            $("#pd_form").on('submit',(function(e) {
                e.preventDefault();
                if(pvalidation()){
                    $.ajax({
                        url: "apis/insert_personnelDetails.php",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(data){
                            // alert(data);
                            if(data.trim()[data.length-1] =="y"){
                                localStorage.setItem('myParameterValue', data);
                                location.reload()
                                $("#campus_focus").focus();
                            }else{
                                alert("tryagain");
                            }
                        }
                    });                    
                }
            }));
        });
    </script>
</body>
</html>
<?php
    }
?>