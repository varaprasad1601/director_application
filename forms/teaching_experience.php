<?php
    if(isset($_SESSION['ApplicationId'])){
        $tid = $_SESSION['ApplicationId'];
        $td_data = mysqli_query($con,"select * from `teachingexp` where `ApplicationId` = '$tid'");
        $td_row = mysqli_fetch_row($td_data);

        $pr_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$tid' and `designation` = 'Professor' ");
        $ad_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$tid' and `designation` = 'Associate Professor' ");
        $sd_data = mysqli_query($con,"select * from `worked_universities` where `ApplicationId` = '$tid' and `designation` = 'Assistant Professor' ");
        $pr_row = mysqli_fetch_row($pr_data);
        $ad_row = mysqli_fetch_row($ad_data);
        $sd_row = mysqli_fetch_row($sd_data);

        if($pr_row != null ){
            $pda_data = explode("*",$pr_row[4]);
            $pun_data = explode("*",$pr_row[3]);
            $ppc_data = explode("*",$pr_row[5]);
        }
        if($ad_row != null ){
            $ada_data = explode("*",$ad_row[4]);
            $aun_data = explode("*",$ad_row[3]);
            $apc_data = explode("*",$ad_row[5]);
        }
        if($sd_row != null ){
            $sda_data = explode("*",$sd_row[4]);
            $sun_data = explode("*",$sd_row[3]);
            $spc_data = explode("*",$sd_row[5]);
        }

?>
<html>
<body>
    <!-- Tab - 3 -->
    <div class="col-md-10 box">
        <h3 class="mt-2">Teaching Experience</h3>
        <hr>
        <form id="t_form" method="post">
            <div class="form-group d-flex justify-content-between mt-4">
                <div class="col-md-3">
                    <label>Total Teaching Experience <label class="err_msg" id="msg"> * </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" id="teaching_experience" <?php echo (($td_row != null)) ? 'value="'.$td_row[2].'" disabled' : 'value=""' ?>>
                </div>
                <div class="col-md-3">
                    <label>Total Length of service as professor as on date <label class="err_msg" id="msg"> * </label></label>
                    <input type="text" class="form-control" id="service" <?php echo (($td_row != null)) ? 'value="'.$td_row[3].'" disabled' : 'value=""' ?>>
                </div>
                <div class="col-md-3">
                    <label>Total Leftover service before Super Annuation <label class="err_msg" id="msg"> * </label></label>
                    <input type="text" class="form-control" id="leftover" <?php echo (($td_row != null)) ? 'value="'.$td_row[4].'" disabled' : 'value=""' ?>>
                </div>
            </div>
            <h3 class="mt-4">Working Experience</h3>
            <hr>
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                <label>Designation</label> <label class="err_msg" id="msg"> * </label>
                    <select class="form-control" id="designation" name="designation" <?php echo (($td_row != null)) ? "disabled" : "" ?>>
                        <option value="-----" >-----</option>
                        <option value="Professor">Professor</option>
                        <option value="Associate Professor">Associate Professor</option>
                        <option value="Assistant Professor">Assistant Professor</option>
                    </select>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 1px !important;">
                    <input type="button" value="Add Details" class="btn btn-dark px-5 mt-3" id="add_btn" onclick="add_designation()" <?php echo (($td_row != null)) ? "disabled" : "" ?>>
                </div>
            </div>

            <div class="col-md-12">

                <!-- Professor -->
                <?php
                if($pr_row != null){
                    if($pda_data[0] != null){
                    ?>
                    <div class="col-md-12" id="prof">
                        <h5 class="pt-4">Professor</h5>
                        <hr>
                    </div>
                    <div id="add_prof">
                        <?php for($i=0; $i<count($pda_data); $i++){?>
                            <div class="form-group d-flex justify-content-between mt-3" id="profdiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="p_da<?php echo $i ?>" value="<?php echo $pda_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="p_un<?php echo $i ?>" value="<?php echo $pun_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                <label><input type="checkbox" id="p_pc<?php echo $i ?>" <?php echo (($ppc_data[$i] == "True")) ? "checked disabled" : "disabled"; ?>> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 5px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-3" style="width:100%;" id="prof_btn<?php echo $i ?>" onclick="prof_del(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                    <?php }else{?>
                        <div class="col-md-12" id="prof" style="display: none;">
                            <h5 class="pt-4">Professor</h5>
                            <hr>
                        </div>
                        <div id="add_prof"></div>
                <?php };
                }else{?>
                    <div class="col-md-12" id="prof" style="display: none;">
                        <h5 class="pt-4">Professor</h5>
                        <hr>
                    </div>
                    <div id="add_prof"></div>
                <?php
                };
                ?>

                <!-- Associate Professor -->
                <?php
                if($ad_row != null){
                    if($ada_data[0] != null){
                    ?>
                    <div class="col-md-12" id="asso_prof">
                        <h5 class="pt-4">Associate Professor</h5>
                        <hr>
                    </div>
                    <div class="col-md-12" id="add_asso">
                        <?php for($i=0; $i<count($ada_data); $i++){?>
                            <div class="form-group d-flex justify-content-between mt-3" id="assodiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="a_da<?php echo $i ?>" value="<?php echo $ada_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="a_un<?php echo $i ?>" value="<?php echo $aun_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                    <label><input type="checkbox" id="a_pc<?php echo $i ?>" <?php echo (($apc_data[$i] == "True")) ? "checked disabled" : "disabled"; ?>> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 5px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-3" style="width:100%;" id="asso_btn<?php echo $i ?>" onclick="asso_del(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                    <?php  }else{ ?>
                        <div class="col-md-12" id="asso_prof" style="display: none;">
                            <h5 class="pt-4">Associate Professor</h5>
                            <hr>
                        </div>
                        <div class="col-md-12" id="add_asso"></div>
                <?php };
                }else{?>
                    <div class="col-md-12" id="asso_prof" style="display: none;">
                        <h5 class="pt-4">Associate Professor</h5>
                        <hr>
                    </div>
                    <div class="col-md-12" id="add_asso">

                    </div>
                <?php
                }
                ?>

                <!-- Assistant Professor -->
                <?php
                if($sd_row != null){
                    if($sda_data[0] != null){
                    ?>
                    <div class="col-md-12" id="assi_prof">
                        <h5 class="pt-4">Assistant Professor</h5>
                        <hr>
                    </div>
                    <div class="col-md-12" id="add_assi">
                        <?php for($i=0; $i<count($sda_data); $i++){?>
                            <div class="form-group d-flex justify-content-between mt-3" id="assidiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="as_da<?php echo $i ?>" value="<?php echo $sda_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="as_un<?php echo $i ?>" value="<?php echo $sun_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                    <label><input type="checkbox" id="as_pc<?php echo $i ?>" <?php echo (($spc_data[$i] == "True")) ? "checked disabled" : "disabled"; ?>> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 5px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-3" style="width:100%;" id="assi_btn<?php echo $i ?>" onclick="assi_del(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                        <?php }; ?>
                    </div>
                    <?php }else{ ?>
                        <div class="col-md-12" id="assi_prof" style="display: none;">
                            <h5 class="pt-4">Assistant Professor</h5>
                            <hr>
                        </div>
                        <div class="col-md-12" id="add_assi"></div>
                <?php };
                }else{?>
                    <div class="col-md-12" id="assi_prof" style="display: none;">
                        <h5 class="pt-4">Assistant Professor</h5>
                        <hr>
                    </div>
                    <div class="col-md-12" id="add_assi"></div>
                <?php
                }
                ?>
            </div>

            
            <div class="form-group mt-4">
                <input type="checkbox" id="agre" <?php echo (($td_row != null)) ? "checked disabled" : "" ?>>&nbsp;  <label for="agre">I Confirm to the above details</label> <label class="err_msg" id="agremsg"> * </label>
            </div>

            <!-- <input type="text" value="tab4()" name="tab" hidden> -->
            <div class="form-group d-flex justify-content-end my-4">
                <?php if($td_row != null){
                    echo '<input type="button" class="btn btn-outline-primary rounded-pill me-4" id="t_ebtn" style="width:175px;" value="Edit" onclick="tenable()">';
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill me-4" id="t_ubtn" style="width:175px; display:none;" value="Update & Next">';
                    if($tab == "tab6()"){
                        echo '<input type="button" class="btn btn-outline-warning rounded-pill space" style="width:175px;" value="Preview" onclick="preview()">';
                    }
                }else{
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill" style="width:175px;" value="Save & Next">';
                }?>
            </div>
        </form>
    </div>

    <!-- Java Script -->
    <script>

        var teaching_experience = document.getElementById("teaching_experience");
        var service = document.getElementById("service");
        var leftover = document.getElementById("leftover");

        var designation = document.getElementById("designation")

        var prof = document.getElementById("add_prof")
        var asso = document.getElementById("add_asso")
        var assi = document.getElementById("add_assi")

        var prof_head = document.getElementById("prof")
        var asso_head = document.getElementById("asso_prof")
        var assi_head = document.getElementById("assi_prof")

        var agre = document.getElementById("agre");
        var msgg = document.getElementById("agremsg");

        var prof_id = 0
        var prof_h = 0
        var asso_id = 0
        var asso_h = 0
        var assi_id = 0
        var assi_h = 0

        var pc = 1;
        var ac = 1;
        var sc = 1;


        <?php
        if($pr_row != null){
            echo 'prof_id =' . count($pda_data). ';'; 
            echo 'prof_h =' . count($pda_data). ';'; 
            if($pda_data[0] != null){
                echo 'pc =' . count($pda_data)+1 . ';'; 
            }
        };
        if($ad_row != null){
            echo 'asso_id =' . count($ada_data). ';'; 
            echo 'asso_h =' . count($ada_data). ';'; 
            if($ada_data[0] != null){
                echo 'ac =' . count($ada_data)+1 . ';';
            }
        };
        if($sd_row != null){
            echo 'assi_id =' . count($sda_data). ';'; 
            echo 'assi_h =' . count($sda_data). ';'; 
            if($sda_data[0] != null){
                echo 'sc =' . count($sda_data)+1 . ';'; 
            }
        };
        ?>


        // Experience ===============================================================================
        function fun_1(){
            teaching_experience.addEventListener('blur',fun_1);
            if(teaching_experience.value.length == 0){
                teaching_experience.style.border = "1px solid red"
                fields("Enter Teaching Experience")
                return false
            }
            else{
                var regex = /^[0-9]*(\.[0-9]*)?$/;
                if(regex.test(teaching_experience.value)){
                    teaching_experience.style.border = "1px solid lightgray" 
                }else{
                    teaching_experience.style.border = "1px solid red"
                    fields("Enter Valid Teaching Experience")
                    return false
                }
            }
        };
        // Experience ===============================================================================


        // Service ==================================================================================
        function fun_2(){
            service.addEventListener('blur',fun_2);
            if(service.value.length == 0){
                service.style.border = "1px solid red"
                fields("Enter Length of service as professor as on date")
                return false
            }
            else{
                var regex = /^[0-9]*(\.[0-9]*)?$/;
                if(regex.test(service.value)){
                    service.style.border = "1px solid lightgray" 
                }else{
                    service.style.border = "1px solid red"
                    fields("Enter Valid Length of service as professor as on date")
                    return false
                }
            }
        };
        // Service ==================================================================================


        // Leftover =================================================================================
        function fun_3(){
            leftover.addEventListener('blur',fun_3);
            if(leftover.value.length == 0){
                leftover.style.border = "1px solid red"
                fields("Enter Leftover service before super annuation")
                return false
            }
            else{
                var regex = /^[0-9]*(\.[0-9]*)?$/;
                if(regex.test(leftover.value)){
                    leftover.style.border = "1px solid lightgray" 
                }else{
                    leftover.style.border = "1px solid red"
                    fields("Enter Valid Leftover service before super annuation")
                    return false
                }
            }
        };
        // Leftover =================================================================================


        // Designation ==========================================================================
        function fun_4(){
            <?php if($pr_row != null){?>
            if((pc == 1 & ac == 1 & sc == 1)){
                designation.style.border = "1px solid red"
                alert("Add Designation")
                return false
            }else{
                if(prof_id > 0){
                    if(check_professor() == false){
                        return false
                    }
                }
                if(asso_id > 0){
                    if(check_associate() == false){
                        return false
                    }
                }
                if(assi_id > 0){
                    if(check_assisstant() == false){
                        return false
                    }
                }
                else{
                    return true
                };
            }; 
            <?php }else {?>
            if(prof_id == 0 & asso_id == 0 & assi_id == 0){
                designation.style.border = "1px solid red"
                alert("Add Designation")
                return false
            }else{
                if(prof_id > 0){
                    if(check_professor() == false){
                        return false
                    }
                }
                if(asso_id > 0){
                    if(check_associate() == false){
                        return false
                    }
                }
                if(assi_id > 0){
                    if(check_assisstant() == false){
                        return false
                    }
                }
                else{
                    return true
                };
            }; 
            <?php }; ?>         
        };
        // Designation =============================================================================


        // Check Designations =======================================================================
        function check_professor(){
            designation.style.border = "1px solid lightgray"
            for(var i=0; i<prof_id; i++){
                p_da = "p_da"+i;
                p_un = "p_un"+i;
                try{
                    pelement1 = document.getElementById(p_da)
                    pelement2 = document.getElementById(p_un)
                    if(pelement1.value.length == 0 || pelement2.value.length == 0){
                        pelement1.style.border = "1px solid red";
                        pelement2.style.border = "1px solid red";
                        alert("Enter Professor Details")
                        return false
                    }
                    else{
                        ptoday = new Date()
                        penterdate = new Date(pelement1.value)
                        if(penterdate.getTime() > ptoday.getTime() | penterdate.getTime() == ptoday.getTime()){
                            alert("Professor: Enter Valid Date")
                            pelement1.style.border = "1px solid red";
                            return false
                        }
                        else{
                            var regex = /^[a-z A-Z,\-_]+$/;
                            if(regex.test((pelement2.value))){
                                pelement1.style.border = "1px solid lightgray";
                                pelement2.style.border = "1px solid lightgray";
                            }else{
                                pelement2.style.border = "1px solid red";
                                alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                                return false
                            }
                        }
                    };
                }catch{
                };
            };
        }

        function check_associate(){
            designation.style.border = "1px solid lightgray"
            for(var i=0; i<=asso_id; i++){
                a_da = "a_da"+i;
                a_un = "a_un"+i;
                try{
                    aelement1 = document.getElementById(a_da)
                    aelement2 = document.getElementById(a_un)
                    if(aelement1.value.length == 0 || aelement2.value.length == 0){
                        aelement1.style.border = "1px solid red";
                        aelement2.style.border = "1px solid red";
                        alert("Enter Associate Professor Details")
                        return false
                    }
                    else{
                        atoday = new Date()
                        aenterdate = new Date(aelement1.value)
                        if(aenterdate.getTime() > atoday.getTime() | aenterdate.getTime() == atoday.getTime()){
                            alert("Associate Professor: Enter Valid Date")
                            aelement1.style.border = "1px solid red";
                            return false
                        }
                        else{
                            var regex = /^[a-z A-Z,\-_]+$/;
                            if(regex.test((aelement2.value))){
                                aelement1.style.border = "1px solid lightgray";
                                aelement2.style.border = "1px solid lightgray";
                            }else{
                                aelement2.style.border = "1px solid red";
                                alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                                return false
                            }
                        }
                    };
                }catch{
                };
            };
        }

        function check_assisstant(){
            designation.style.border = "1px solid lightgray"
            for(var i=0; i<assi_id; i++){
                s_da = "as_da"+i;
                s_un = "as_un"+i;
                try{
                    selement1 = document.getElementById(s_da)
                    selement2 = document.getElementById(s_un)
                    if(selement1.value.length == 0 || selement2.value.length == 0){
                        selement1.style.border = "1px solid red";
                        selement2.style.border = "1px solid red";
                        alert("Enter Assisstant Professor Details")
                        return false
                    }
                    else{
                        stoday = new Date()
                        senterdate = new Date(selement1.value)
                        if(senterdate.getTime() > stoday.getTime() | senterdate.getTime() == stoday.getTime()){
                            alert("Assisstant Professor: Enter Valid Date")
                            selement1.style.border = "1px solid red";
                            return false
                        }
                        else{
                            var regex = /^[a-z A-Z,\-_]+$/;
                            if(regex.test((selement2.value))){
                                selement1.style.border = "1px solid lightgray";
                                selement2.style.border = "1px solid lightgray";
                            }else{
                                selement2.style.border = "1px solid red";
                                alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                                return false
                            }
                        }
                    };
                }catch{
                };
            };
        }

        // Check Designations =======================================================================


        // Add Designation ==========================================================================
        function add_designation(){
            if(designation.value == "-----"){
                designation.style.border = "1px solid red"
                alert("Select Designation")
                return false
            }
            else{
                designation.style.border = "1px solid lightgray"
                if(designation.value == "Professor"){
                    prof_head.style.display = "contents"
                    var string = `<div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="p_da`+prof_id+`">
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="p_un`+prof_id+`">
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                    <label><input type="checkbox" id="p_pc`+prof_id+`"> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 4px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-4 delete_prof" style="width:100%;">
                                </div>`
                    var prof_code = document.createElement("div");
                    prof_code.setAttribute("class","form-group d-flex justify-content-between mt-3")
                    prof_code.innerHTML = string;
                    prof.appendChild(prof_code);
                    
                    var deleteButtons = document.getElementsByClassName("delete_prof");
                    for (var i = 0; i < deleteButtons.length; i++) {
                        deleteButtons[i].addEventListener("click", delete_professor);
                    }
                    prof_id++;
                    prof_h++;
                    pc++;
                }
                if(designation.value == "Associate Professor"){
                    asso_head.style.display = "contents"
                    var string = `<div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="a_da`+asso_id+`">
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="a_un`+asso_id+`">
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                    <label><input type="checkbox" id="a_pc`+asso_id+`"> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 4px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-4 delete_asso" style="width:100%;">
                                </div>`
                    var asso_code = document.createElement("div");
                    asso_code.setAttribute("class","form-group d-flex justify-content-between mt-3")
                    asso_code.innerHTML = string;
                    asso.appendChild(asso_code);
                    
                    var deleteButtons = document.getElementsByClassName("delete_asso");
                    for (var i = 0; i < deleteButtons.length; i++) {
                        deleteButtons[i].addEventListener("click", delete_associate);
                    }
                    asso_id++;
                    asso_h++;
                    ac++;
                }                    
                if(designation.value == "Assistant Professor"){
                    assi_head.style.display = "contents"
                    var string = `<div class="col-md-3">
                                    <label>Date of Appoinment <label class="err_msg" id="msg"> * </label></label>
                                    <input type="date" class="form-control" id="as_da`+assi_id+`">
                                </div>
                                <div class="col-md-3">
                                    <label>University Name <label class="err_msg" id="msg"> * </label></label>
                                    <input type="text" class="form-control" id="as_un`+assi_id+`">
                                </div>
                                <div class="col-md-3 d-flex align-items-center justify-content-center pt-4 checkbox">
                                    <label><input type="checkbox" id="as_pc`+assi_id+`"> Private College </label>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center" style="margin-top: 6px !important;">
                                    <input type="button" value="Delete" class="btn btn-danger px-5 mt-4 delete_assi" style="width:100%;">
                                </div>`
                    var assi_code = document.createElement("div");
                    assi_code.setAttribute("class","form-group d-flex justify-content-between mt-3")
                    assi_code.innerHTML = string;
                    assi.appendChild(assi_code);
                    
                    var deleteButtons = document.getElementsByClassName("delete_assi");
                    for (var i = 0; i < deleteButtons.length; i++) {
                        deleteButtons[i].addEventListener("click", delete_assisstant);
                    }
                    assi_id++;
                    assi_h++;
                    sc++;
                }
            }
        };
        // Add Designation ==========================================================================


        // Delete Professor =========================================================================
        function delete_professor(e){
            var parentDiv = e.target.closest(".form-group");
            if (parentDiv) {
                if (confirm("Are you sure  want to delete?")){
                    parentDiv.remove();
                    prof_h--;
                    pc--;
                    if (prof_h == 0){
                        prof_id = 0
                        prof_head.style.display = "none"
                    }
                }
            }
        };
        // Delete Professor =========================================================================

        // Delete Professor =============================================================================
        function prof_del(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("profdiv_"+value);
                prof.removeChild(p_div);
                prof_h--;
                pc--;
                if (prof_h == 0){
                    prof_id = 1
                    prof_head.style.display = "none"
                }
            }
        }
        // Delete Professor =============================================================================


        // Delete Associate =========================================================================
        function delete_associate(e){
            var parentDiv = e.target.closest(".form-group");
            if (parentDiv) {
                if (confirm("Are you sure  want to delete?")){
                    parentDiv.remove();
                    asso_h--;
                    ac--;
                    if (asso_h == 0){
                        asso_id = 0
                        asso_head.style.display = "none"
                    }
                }
            }
        };
        // Delete Associate =========================================================================

        // Delete Associate =============================================================================
        function asso_del(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("assodiv_"+value);
                asso.removeChild(p_div);
                asso_h--;
                ac--;
                if (asso_h == 0){
                    asso_id = 1
                    asso_head.style.display = "none"
                }
            }
        }
        // Delete Associate =============================================================================


        // Delete Assisstant =========================================================================
        function delete_assisstant(e){
            var parentDiv = e.target.closest(".form-group");
            if (parentDiv) {
                if (confirm("Are you sure  want to delete?")){
                    parentDiv.remove();
                    assi_h--;
                    sc--;
                    if (assi_h == 0){
                        assi_id = 0 
                        assi_head.style.display = "none"
                    }
                }
            }
        };
        // Delete Assisstant =========================================================================

        // Delete Assisstant =============================================================================
        function assi_del(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("assidiv_"+value);
                assi.removeChild(p_div);
                assi_h--;
                sc--;
                if (assi_h == 0){
                    assi_id = 1
                    assi_head.style.display = "none"
                }
            }
        }
        // Delete Assisstant =============================================================================

        


        // agree ===================================================================================
        function agree_fun(){
            if(agre.checked){
            }
            else{
                alert("Select Agree")
                msgg.innerHTML = "* Required field"
                return false
            }
        };
        // agree ===================================================================================


        // Validation ===============================================================================
        function tvalidation(){
            if(fun_1() == false){return false}
            if(fun_2() == false){return false}
            if(fun_3() == false){return false}
            if(fun_4() == false){return false}
            if(agree_fun() == false){return false}
            else{return true}
        };
        // Validation ===============================================================================


        // Enable ==================================================================================
        function tenable(){
            document.getElementById("t_ebtn").style.display = "none";
            document.getElementById("t_ubtn").style.display = "block";
            document.getElementById("add_btn").removeAttribute("disabled");
            teaching_experience.removeAttribute("disabled");
            service.removeAttribute("disabled");
            leftover.removeAttribute("disabled");
            designation.removeAttribute("disabled");
            agre.removeAttribute("disabled");
            agre.removeAttribute("checked");
            <?php
            if($pr_row != null){
                if($pda_data[0] != null){
                    for($i=0; $i<count($pda_data); $i++){
                        echo 'document.getElementById("p_da'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("p_un'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("p_pc'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("prof_btn'.$i.'").removeAttribute("disabled");';
                    }
                }
            }
            if($ad_row != null){
                if($ada_data[0] != null){
                    for($i=0; $i<count($ada_data); $i++){
                        echo 'document.getElementById("a_da'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("a_un'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("a_pc'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("asso_btn'.$i.'").removeAttribute("disabled");';
                    }
                }
            }
            if($sd_row != null){
                if($sda_data[0] != null){
                    for($i=0; $i<count($sda_data); $i++){
                        echo 'document.getElementById("as_da'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("as_un'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("as_pc'.$i.'").removeAttribute("disabled");';
                        echo 'document.getElementById("assi_btn'.$i.'").removeAttribute("disabled");';
                    }
                }
            }
            ?>
        }
        // Enable ==================================================================================


        // Send Data ==============================================================================
        $(document).ready(function (e) {
            $("#t_form").on('submit',(function(e) {
                e.preventDefault();
                if(tvalidation()){
                    //-------------------
                    var p_da_str = "";
                    var p_un_str = "";
                    var p_pc_str = "";
                    for(let i=0;i<prof_id;i++){
                        if(document.getElementById("p_da"+i)){
                            p_da_str = p_da_str + $("#p_da"+i).val()+"*";
                            p_un_str = p_un_str + $("#p_un"+i).val()+"*";
                            if($("#p_pc"+i).prop("checked")){
                                p_pc_str = p_pc_str + "True" +"*";
                            }else{
                                p_pc_str = p_pc_str + "False" +"*";
                            }
                        }
                    }
                    var a_da_str = "";
                    var a_un_str = "";
                    var a_pc_str = "";
                    for(let i=0;i<asso_id;i++){
                        if(document.getElementById("a_da"+i)){
                            a_da_str = a_da_str + $("#a_da"+i).val()+"*";
                            a_un_str = a_un_str + $("#a_un"+i).val()+"*";
                            if($("#a_pc"+i).prop("checked")){
                                a_pc_str = a_pc_str + "True" +"*";
                            }else{
                                a_pc_str = a_pc_str + "False" +"*";
                            }
                        }
                    }
                    var as_da_str = "";
                    var as_un_str = "";
                    var as_pc_str = "";
                    for(let i=0;i<assi_id;i++){
                        if(document.getElementById("as_da"+i)){
                            as_da_str = as_da_str + $("#as_da"+i).val()+"*";
                            as_un_str = as_un_str + $("#as_un"+i).val()+"*";
                            if($("#as_pc"+i).prop("checked")){
                                as_pc_str = as_pc_str + "True" +"*";
                            }else{
                                as_pc_str = as_pc_str + "False" +"*";
                            }
                        }
                    }
                    var texp = $("#teaching_experience").val().trim();
                    var lenServ = $("#service").val().trim();
                    var leftServ = $("#leftover").val().trim();
                    
                    var tData = '{"Professor":"'+p_da_str+";"+p_un_str+";"+p_pc_str+'","Associate Professor":"'+a_da_str+";"+a_un_str+";"+a_pc_str+'","Assistant Professor":"'+as_da_str+";"+as_un_str+";"+as_pc_str+'"}';
                    console.log(tData);
                    $.ajax({
                        url: "apis/insert_teachingDetails.php",
                        type: "POST",
                        data: {tx:texp,len:lenServ,left:leftServ,t:tData,p:prof_h,a:asso_h,s:assi_h},
                        beforeSend:function(){
                            // Extra
                        },
                        success: function(data){
                            // alert(data);
                            if(data.trim()[data.length-1] =="y"){
                                localStorage.setItem('myParameterValue', data);
                                location.reload();
                                $("#campus_focus").focus();
                            }else{
                                alert("tryagain");
                            }
                        }
                    });
                }
            }));
        });
        // Send Data ==============================================================================

    </script>
    <!-- Java Script -->

</body>
</html>
<?php
    }
?>