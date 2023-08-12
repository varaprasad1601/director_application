<?php
    if(isset($_SESSION['ApplicationId'])){
        $id = $_SESSION['ApplicationId'];
        $arow = "";
        $q1 = mysqli_query($con,"SELECT * FROM `administrativeexp` where `ApplicationId` = '$id'");
        $count = mysqli_num_rows($q1);
        if($count!=0){
            $arow = mysqli_fetch_row($q1);
            $pos_data = explode("<>",$arow[2]);
            $from_data = explode("<>",$arow[3]);
            $to_data = explode("<>",$arow[4]);
        }
        $crow = "";
        $q2 = mysqli_query($con,"SELECT * FROM `cases` where `ApplicationId` = '$id'");
        $count = mysqli_num_rows($q2);
        if($count!=0){
            $crow = mysqli_fetch_row($q2);
            $case_data = explode("<>",$crow[2]);
            $cname_data = explode("<>",$crow[3]);
            $cstatus_data = explode("<>",$crow[4]);
        }
        $orow = "";
        $q3 = mysqli_query($con,"SELECT * FROM `other` where `ApplicationId` = '$id'");
        $count = mysqli_num_rows($q3);
        if($count!=0){
            $orow = mysqli_fetch_row($q3);
        }
?>
<html>
<body>
    <!-- Tab - 5 -->
    <div class="col-md-10 box">
        <h3 class="mt-2">Administrative Positions</h3>
        <hr>
        <form method="post" id="ad_form">
            <div class="col-md-12" id="positions">
                <?php if($arow){
                    for($i=0; $i<count($pos_data); $i++){?>
                    <div class="form-group d-flex justify-content-between mt-4" id="posdiv<?php echo $i ?>">
                        <div class="col-md-3">
                            <label>Name of the Position</label> <?php echo (($i == 0)) ? '<label class="err_msg" id="msg"> * </label>' : '' ?>
                            <input type="text" class="form-control" id="position<?php echo $i ?>" placeholder="Position" <?php echo (($arow)) ? 'value="'.$pos_data[$i].'" disabled' : "" ?>>
                        </div>
                        <div class="col-md-3">
                            <label>From</label> <?php echo (($i == 0)) ? '<label class="err_msg" id="msg"> * </label>' : '' ?>
                            <input type="date" class="form-control" id="from<?php echo $i ?>" <?php echo (($arow)) ? 'value="'.$from_data[$i].'" disabled' : "" ?>>
                        </div>
                        <div class="col-md-3">
                            <label>To</label> <?php echo (($i == 0)) ? '<label class="err_msg" id="msg"> * </label>' : '' ?>
                            <input type="date" class="form-control" id="to<?php echo $i ?>" <?php echo (($arow)) ? 'value="'.$to_data[$i].'" disabled' : "" ?>>
                        </div>
                        <div class="col-md-2 d-flex justify-content-end align-items-center mt-1 pt-1">
                            <?php if($i == 0){ ?>
                                <input type="button" value="Add Row" class="btn btn-dark mt-2" style="height: 30px; width:100%;" id="pdel_btn<?php echo $i ?>" onclick="add_positions()" disabled>
                            <?php }else{ ?>
                                <input type="button" value="Delete Row" class="btn btn-danger mt-2" style="height: 30px; width:100%;" id="pdel_btn<?php echo $i ?>" onclick="remove_position(<?php echo $i ?>)" disabled>
                            <?php } ?>
                        </div>
                    </div>
                <?php }}else{ ?>
                    <div class="form-group d-flex justify-content-between mt-4">
                        <div class="col-md-3">
                            <label>Name of the Position</label> <label class="err_msg" id="msg"> * </label>
                            <input type="text" class="form-control" id="position0" placeholder="Position">
                        </div>
                        <div class="col-md-3">
                            <label>From</label> <label class="err_msg" id="msg"> * </label>
                            <input type="date" class="form-control" id="from0">
                        </div>
                        <div class="col-md-3">
                            <label>To</label> <label class="err_msg" id="msg"> * </label>
                            <input type="date" class="form-control" id="to0">
                        </div>
                        <div class="col-md-2 d-flex justify-content-end align-items-center mt-3 pt-1">
                            <p class="btn btn-dark mt-2" style="height: 30px; width:100%;" onclick="add_positions()">Add Row</p>
                        </div>
                    </div>
                <?php }; ?>
            </div>


            <h5 class="pt-4">ACB / Vigilance / Criminal / Departmental Cases / Enquiries-Pending</h5>
            <hr>

            <!-- <form method="post" id="cs_form"> -->
                <div class="col-md-12" id="cases">
                    <?php if($crow){ 
                        for($i=0; $i<count($case_data); $i++){ 
                            // if($case_data[$i] != null & $cname_data[$i] != " " & $cstatus_data[$i] != " "){?>
                                <div class="form-group d-flex justify-content-between mt-4" id="casediv<?php echo $i ?>">
                                    <div class="col-md-3">
                                        <label>Type of Case</label>
                                        <select class="form-control" id="case<?php echo $i ?>" disabled>
                                            <option value="-----">Select</option>
                                            <option value="ACB" <?php echo (($case_data[$i] == 'ACB')) ? 'selected' : '' ?>>ACB</option>
                                            <option value="Vigilance" <?php echo (($case_data[$i] == 'Vigilance')) ? 'selected' : '' ?>>Vigilance</option>
                                            <option value="Criminal" <?php echo (($case_data[$i] == 'Criminal')) ? 'selected' : '' ?>>Criminal</option>
                                            <option value="Departmental Cases" <?php echo (($case_data[$i] == 'Departmental Cases')) ? 'selected' : '' ?>>Departmental Cases</option>
                                            <option value="Enquiries - Pending" <?php echo (($case_data[$i] == 'Enquiries - Pending')) ? 'selected' : '' ?>>Enquiries - Pending</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Name of the Case</label>
                                        <input type="text" class="form-control" id="caseName<?php echo $i ?>" <?php echo (($crow)) ? 'value="'.$cname_data[$i].'" disabled' : '' ?>>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Status of the Case</label>
                                        <input type="text" class="form-control" id="caseStatus<?php echo $i ?>" <?php echo (($crow)) ? 'value="'.$cstatus_data[$i].'" disabled' : '' ?>>
                                    </div>
                                    <div class="col-md-2 d-flex justify-content-end align-items-center mt-1 pt-1">
                                        <?php if($i == 0){ ?>
                                            <input type="button" value="Add Row" class="btn btn-dark mt-2" style="height: 30px; width:100%;" id="cdel_btn<?php echo $i ?>" onclick="add_case()" disabled>
                                        <?php }else{ ?>
                                            <input type="button" value="Delete Row" class="btn btn-danger mt-2" style="height: 30px; width:100%;" id="cdel_btn<?php echo $i ?>" onclick="remove_case(<?php echo $i ?>)" disabled>
                                        <?php } ?>
                                    </div>
                                </div>
                        <?php }
                        // }
                    }else{ ?>
                        <div class="form-group d-flex justify-content-between mt-4">
                            <div class="col-md-3">
                                <label>Type of Case</label>
                                <select class="form-control" id="case0">
                                    <option value="-----">Select</option>
                                    <option value="ACB">ACB</option>
                                    <option value="Vigilance">Vigilance</option>
                                    <option value="Criminal">Criminal</option>
                                    <option value="Departmental Cases">Departmental Cases</option>
                                    <option value="Enquiries - Pending">Enquiries - Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label>Name of the Case</label>
                                <input type="text" class="form-control" id="caseName0">
                            </div>
                            <div class="col-md-3">
                                <label>Status of the Case</label>
                                <input type="text" class="form-control" id="caseStatus0">
                            </div>
                            <div class="col-md-2 d-flex justify-content-end align-items-center mt-1 pt-1">
                                <input type="button" value="Add Row" class="btn btn-dark mt-2" style="height: 30px; width:100%;" onclick="add_case()">
                            </div>
                        </div>
                    <?php }?>
                </div>
            <!-- </form> -->
            
            <h5 class="pt-4">Any other Information</h5>
            <hr>
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-12">
                    <!-- <label>Any other Information</label>  -->
                    <textarea class="form-control" rows="5" id="anyInfo" <?php echo (($orow != null)) ? "disabled" : "" ?>><?php echo (($orow != null)) ? $orow[1] : "" ?></textarea>
                </div>
            </div>
            

            <div class="form-group mt-4">
                <input type="checkbox" id="agreee" <?php echo (($arow != null)) ? "checked disabled" : "" ?>>&nbsp;  <label for="agreee">I Confirm to the above details</label> <label class="err_msg" id="agreeemsg"> * </label>
            </div>
            <div class="form-group d-flex justify-content-end my-4">
                <?php if($arow){
                    echo '<input type="button" class="btn btn-outline-primary rounded-pill me-4" id="a_ebtn" style="width:175px;" value="Edit" onclick="aenable()">';
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill me-4" id="a_ubtn" style="width:175px; display:none;" value="Update & Next">';
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

        $(document).ready(function (e) {
            $(window).scrollTop(0);
        })

        var positions = document.getElementById("positions")
        var cases = document.getElementById("cases");

        var position = document.getElementById("position0")
        var from = document.getElementById("from0")
        var to = document.getElementById("to0")

        var anyInfo = document.getElementById("anyInfo")

        var agreee = document.getElementById("agreee");
        var msge = document.getElementById("agreeemsg");

        var pos = 1
        var posc = 0
        var cas = 1
        var casc = 0

        var alert_status = 0

        function alert_check(){
            if(position.value != ""){
                alert_status  += 1;
            }
            console.log(alert_status)
        }
        alert_check()

        <?php
        if($arow != null){
            echo 'pos =' . count($pos_data). ';'; 
            echo 'posc =' . count($pos_data). ';'; 
        };
        if($crow != null){
            echo 'cas =' . count($case_data). ';'; 
            echo 'casc =' . count($case_data). ';'; 
        };
        ?>


        // Add Positions ====================================================================
        function add_positions(){
            if(position.value.length == 0 || to.value.length == 0 || to.value.length == 0){
                position.style.border = "1px solid red"
                from.style.border = "1px solid red"
                to.style.border = "1px solid red"
                alert("Enter Details")
                return false
            }
            else{
                position.style.border = "1px solid lightgray"
                from.style.border = "1px solid lightgray"
                to.style.border = "1px solid lightgray"
                if (posc == 4){
                    alert("Add only top 5 positions ")
                }else{
                    pos_num = pos+1;
                    var position_string = `<div class="col-md-3">
                                            <label>Name of the Position</label>
                                            <input type="text" class="form-control" id="position`+pos+`" placeholder="Position">
                                        </div>
                                        <div class="col-md-3">
                                            <label>From</label>
                                            <input type="date" class="form-control" id="from`+pos+`">
                                        </div>
                                        <div class="col-md-3">
                                            <label>To</label>
                                            <input type="date" class="form-control" id="to`+pos+`">
                                        </div>
                                        <div class="col-md-2 d-flex justify-content-end align-items-center mt-1 pt-1">
                                            <input type="button" value="Delete Row" class="btn btn-danger mt-2 delete_position" style="height: 30px; width:100%;">
                                        </div>`;
                    var position_code = document.createElement("div");
                    position_code.setAttribute("class","form-group d-flex justify-content-between mt-4");
                    position_code.innerHTML = position_string;
                    positions.appendChild(position_code);

                    var delete_classes0 = document.getElementsByClassName("delete_position")
                    for(var i=0;i<delete_classes0.length;i++){
                        delete_classes0[i].addEventListener("click",delete_positions)
                    }
                    pos++;
                    posc ++;
                    console.log("position:"+pos,posc);
                }
            };
        };
        // Add Positions ====================================================================


        // Add cases ====================================================================
        function add_case(){
            case_num = cas+1;
            var case_string = `<div class="col-md-3">
                        <label>Type of Case</label>
                        <select class="form-control" id="case`+cas+`">
                            <option value="-----">Select</option>
                            <option value="ACB">ACB</option>
                            <option value="Vigilance">Vigilance</option>
                            <option value="Criminal">Criminal</option>
                            <option value="Departmental Cases">Departmental Cases</option>
                            <option value="Enquiries - Pending">Enquiries - Pending</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label>Name of the Case</label>
                        <input type="text" class="form-control" id="caseName`+cas+`">
                    </div>
                    <div class="col-md-3">
                        <label>Status of the Case</label>
                        <input type="text" class="form-control" id="caseStatus`+cas+`">
                    </div>
                    <div class="col-md-2 d-flex justify-content-end align-items-center mt-1 pt-1">
                        <input type="button" value="Delete Row" class="btn btn-danger mt-2 delete_case" style="height: 30px; width:100%;">
                    </div>`;
            var case_code = document.createElement("div");
            case_code.setAttribute("class","form-group d-flex justify-content-between mt-4");
            case_code.innerHTML = case_string;
            cases.appendChild(case_code);

            var delete_classes1 = document.getElementsByClassName("delete_case")
            for(var i=0;i<delete_classes1.length;i++){
                delete_classes1[i].addEventListener("click",delete_case)
            }
            cas++;
            casc ++;
            console.log("case:"+cas);
        }
        // Add cases ====================================================================


        // Delete Position ===================================================================
        function delete_positions(e){
            var main_position = e.target.closest(".form-group")
            if(main_position){
                if (confirm("Are you sure  want to delete?")){
                    main_position.remove();
                    posc --;
                    if (posc == 0){
                        pos = 0;
                    }
                    console.log("position:"+pos,posc);
                }
            }
        }
        // Delete Position ===================================================================


        // Delete Position ===================================================================
        function remove_position(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("posdiv"+value);
                p_div.remove();
                posc --;
                if (posc == 0){
                    pos = 0;
                }
                console.log("position:"+pos,posc);
            }
        }
        // Delete Position ===================================================================


        // Delete Cases ===================================================================
        function delete_case(e){
            var main_case = e.target.closest(".form-group")
            if(main_case){
                if (confirm("Are you sure  want to delete?")){
                    main_case.remove();
                    casc --;
                    if (casc == 0){
                        cas = 0;
                    }
            }
            }
        }
        // Delete Cases ===================================================================

        // Delete Cases ===================================================================
        function remove_case(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("casediv"+value);
                p_div.remove();
                casc --;
                if (casc == 0){
                    cas = 0;
                }
                console.log("case:"+cas,casc);
            }
        }
        // Delete Cases ===================================================================


        // position =========================================================================
        function position_function(){
            position.addEventListener("change",position_function)
            if(position.value.length == 0){
                position.style.border = "1px solid red"
                alert("Enter Position")
                return false
            }
            else{
                var regex = /^[a-z A-Z,\-_]+$/;
                if(regex.test((position.value))){
                    position.style.border = "1px solid lightgray";
                }else{
                    position.style.border = "1px solid red";
                    alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                    return false
                }
            }
        };
        // position =========================================================================

        
        // from =========================================================================
        function from_function(){
            from.addEventListener("change",from_function)
            if(from.value.length == 0){
                from.style.border = "1px solid red"
                alert("Enter From Date")
                return false
            }
            else{
                presentdate = new Date()
                fromdate = new Date(from.value)
                if(presentdate.getTime() < fromdate.getTime() || presentdate.getTime() == fromdate.getTime()){
                    from.style.border = "1px solid red"
                    alert("Enter Valid From Date")
                    return false
                }
                else{
                    if(to.value.length == 0){
                        from.style.border = "1px solid lightgray"
                    }
                    else{
                        to_function()
                    }
                }
            }
        };
        // from =========================================================================


        // To =========================================================================
        function to_function(){
            to.addEventListener("change",to_function)
            if(to.value.length == 0){
                to.style.border = "1px solid red"
                alert("Enter To Date")
                return false
            }
            else{
                presentdate = new Date()
                todate = new Date(to.value)
                if(presentdate.getTime() < todate.getTime()){
                    to.style.border = "1px solid red"
                    alert("Enter Valid To Date")
                    return false
                }
                else{
                    fromdate = new Date(from.value)
                    if(todate.getTime() < fromdate.getTime()){
                        to.style.border = "1px solid red"
                        from.style.border = "1px solid red"
                        alert("From Date must be less than To Date")
                        return false
                    }
                    else{
                        to.style.border = "1px solid lightgray"
                        from.style.border = "1px solid lightgray"
                    }
                }
            }
        };
        // To ====================================================================================

        
        // agree ==================================================================================
        function agreee_function(){
            if(agreee.checked){
            }
            else{
                fields("Select Agree")
                msge.innerHTML = "* Required field"
                return false
            }
        };
        // agree ==================================================================================


        // agree ==================================================================================
        function check_campus(){
            campus_check()
            if(alert_campus == 0){
                alert("Select Campus");
                // $("#nuzvid_campus").css("border","1px solid red !important");
                $(window).scrollTop(0);
                    return false
            }
            else{
                // alert("Selected "+$("#campus").val()+" campus for Application..!!");
            }
        };
        // agree ==================================================================================


        // Validation ==============================================================================
        function avalidation(){
            if(position_function() == false){return false}
            if(from_function() == false){return false}
            if(to_function() == false){return false}
            if(agreee_function() == false){return false}
            if(check_campus() == false){return false}
            else{return true}
        };
        // Validation ===================================================================


        // Enable ======================================================================
        function aenable(){
            document.getElementById("a_ebtn").style.display = "none";
            document.getElementById("a_ubtn").style.display = "block";
            anyInfo.removeAttribute("disabled");
            agreee.removeAttribute("disabled");
            agreee.removeAttribute("checked");
            <?php 
            if($arow != null ){
                for($i=0; $i<count($pos_data); $i++){
                    echo 'document.getElementById("position'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("from'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("to'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("pdel_btn'.$i.'").removeAttribute("disabled");';
                }
            };

            if($crow != null ){
                for($i=0; $i<count($case_data); $i++){
                    echo '
                    try{
                        document.getElementById("case'.$i.'").removeAttribute("disabled");
                        document.getElementById("caseName'.$i.'").removeAttribute("disabled");
                        document.getElementById("caseStatus'.$i.'").removeAttribute("disabled");
                        document.getElementById("cdel_btn'.$i.'").removeAttribute("disabled");
                    }catch{};';
                }
            } ?>
        }
        // Enable ======================================================================
        
        $(document).ready(function (e) {
            $("#ad_form").on('submit',(function(e) {
                e.preventDefault();
                if(avalidation()){
                    var pos_n ="";
                    var pos_f ="";
                    var pos_t ="";
                    for (let x=0;x<=pos;x++){
                        if(document.getElementById("position"+x)){
                            if($("#position"+x).val() != "" & $("#from"+x).val() != "" & $("#to"+x).val() != ""){
                                pos_n = pos_n + $("#position"+x).val().trim() + "<>";
                                pos_f = pos_f + $("#from"+x).val().trim() + "<>";
                                pos_t = pos_t + $("#to"+x).val().trim() + "<>";
                            }
                        }
                    }
                    var case_t ="";
                    var case_n ="";
                    var case_s ="";
                    for (let x=0;x<=cas;x++){
                        if(document.getElementById("case"+x)){
                            if($("#case"+x).val() != "-----" & $("#caseName"+x).val() != "" & $("#caseStatus"+x).val() != ""){
                                case_t = case_t + $("#case"+x).val() + "<>";
                                case_n = case_n + $("#caseName"+x).val() + "<>";
                                case_s = case_s + $("#caseStatus"+x).val() + "<>";
                                console.log(case_n,case_s)
                            }
                        }
                    }
                    //---------
                    var anyInfo = $("#anyInfo").val().trim();
                    var a_pData = '{"positions":"'+pos_n+";"+pos_f+";"+pos_t+'"}';
                    var a_cData = '{"cases":"'+case_t+";"+case_n+";"+case_s+'"}';
                    //---------
                    // console.log(aData);
                    $.ajax({
                        url: "apis/insert_administrativeDetails.php",
                        type: "POST",
                        data: { p_c :pos, c_c :cas, ap :a_pData, ac :a_cData, i :anyInfo},
                        beforeSend:function(){
                            // Extra
                        },
                        success: function(data){
                            if(data.trim()[data.length-1] ==">"){
                                alert_check()
                                console.log(alert_status)
                                if(alert_status > 1){
                                    localStorage.setItem('myParameterValue', 'Administrative Positions Updated Successfully');
                                    // alert("Administrative Positions Submitted Successfully")
                                    location.reload();
                                }else{
                                    localStorage.setItem('myParameterValue', 'Administrative Positions Submitted Successfully');
                                    // alert("Administrative Positions Updated Successfully")
                                    location.reload();
                                }
                            }
                            else{
                                alert("tryagain");
                            }
                        }
                    });
                }
            }));
        });

    </script>
    <!-- Java Script -->

</body>
</html>
<?php
    }
?>