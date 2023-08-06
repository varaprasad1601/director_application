<?php
    if(isset($_SESSION['ApplicationId'])){
        $qid = $_SESSION['ApplicationId'];
        $ug_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$qid' and `qualification` = 'Under Graduation'");
        $pg_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$qid' and `qualification` = 'Post Graduation'");
        $pd_data = mysqli_query($con,"select * from `qualifications` where `ApplicationId` = '$qid' and `qualification` = 'Ph.D'");
        $ug_row = mysqli_fetch_row($ug_data);
        $pg_row = mysqli_fetch_row($pg_data);
        $pd_row = mysqli_fetch_row($pd_data);
    }
    if($ug_row != null){
        $ucy_data = explode("<>",$ug_row[3]);
        $usp_data = explode("<>",$ug_row[4]);
        $uau_data = explode("<>",$ug_row[5]);
    }
    if($pg_row != null){
        $pcy_data = explode("<>",$pg_row[3]);
        $psp_data = explode("<>",$pg_row[4]);
        $pau_data = explode("<>",$pg_row[5]);
    }
    if($pd_row != null){
        $dcy_data = explode("<>",$pd_row[3]);
        $dsp_data = explode("<>",$pd_row[4]);
        $dau_data = explode("<>",$pd_row[5]);
    }
?>
<html>
<body>
    <!-- Tab -2  -->
    <div class="col-md-10 box">
        <h3 class="mt-2">Qualification</h3>
        <hr>
        <form id ="q_form" method="post">
            <!-- Under Graduation -->
            <h5 class="pt-4">Under Graduation</h5><hr>
            <div class="form-group d-flex justify-content-between mt-2">
                <div class="col-md-3">
                    <label>Completed Year</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" id="ug_cy0" <?php echo ($ug_row != null) ? 'value="' . $ucy_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Specialization</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="ug_sp0" <?php echo ($ug_row != null) ? 'value="' . $usp_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Awarded University</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="ug_au0" <?php echo ($ug_row != null) ? 'value="' . $uau_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                    <input type="button" value="Add Row" class="btn btn-dark" style="height: 30px; width:100%;" id="add_ug_row" <?php echo ($ug_row != null) ? ' disabled' : ' '; ?>>
                </div>
            </div>

            <div id="add_ug">
            <?php
                if($ug_row != null){
                    for($i=1; $i<count($ucy_data); $i++){ 
                        if($ucy_data[$i]){?>
                            <div class="form-group d-flex justify-content-between mt-2" id="udiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Completed Year</label>
                                    <input type="number" class="form-control" id="ug_cy<?php echo $i ?>" value="<?php echo $ucy_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Specialization</label>
                                    <input type="text" class="form-control" id="ug_sp<?php echo $i ?>" value="<?php echo $usp_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Awarded University</label>
                                    <input type="text" class="form-control" id="ug_au<?php echo $i ?>" value="<?php echo $uau_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                                    <input type="button" value="Delete Row" class="delete_btn btn btn-danger" id="ug_delete<?php echo $i ?>" style="height: 30px; width:100%;" onclick="remove_ug(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                    <?php }
                    }
                }
            ?>
            </div>
            
            

            <!-- Post Graduation -->
            <h5 class="pt-4">Post Graduation</h5><hr>
            <div class="form-group d-flex justify-content-between mt-2">
                <div class="col-md-3">
                    <label>Completed Year</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" id="pg_cy0" <?php echo ($ug_row != null) ? 'value="' . $pcy_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Specialization</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="pg_sp0" <?php echo ($ug_row != null) ? 'value="' . $psp_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Awarded University</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="pg_au0" <?php echo ($ug_row != null) ? 'value="' . $pau_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                    <input type="button" value="Add Row" class="btn btn-dark" style="height: 30px; width:100%;" id="add_pg_row" <?php echo ($pg_row != null) ? ' disabled' : ' '; ?>>
                </div>
            </div>
            <div id="add_pg">
            <?php
                if($pg_row != null){
                    for($i=1; $i<count($pcy_data); $i++){
                        if($pcy_data[$i]){?>
                            <div class="form-group d-flex justify-content-between mt-2" id="pdiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Completed Year</label>
                                    <input type="number" class="form-control" id="pg_cy<?php echo $i ?>" value="<?php echo $pcy_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Specialization</label>
                                    <input type="text" class="form-control" id="pg_sp<?php echo $i ?>" value="<?php echo $psp_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Awarded University</label>
                                    <input type="text" class="form-control" id="pg_au<?php echo $i ?>" value="<?php echo $pau_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                                    <input type="button" value="Delete Row" class="delete_btn btn btn-danger" id="pg_delete<?php echo $i ?>" style="height: 30px; width:100%;" onclick="remove_pg(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                    <?php }
                    }
                }
            ?>
            </div>



            <!-- Ph. D -->
            <h5 class="pt-4">Ph. D</h5><hr>
            <div class="form-group d-flex justify-content-between mt-2">
                <div class="col-md-3">
                    <label>Completed Year</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" id="pd_cy0" <?php echo ($pd_row != null) ? 'value="' . $dcy_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Specialization</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="pd_sp0" <?php echo ($pd_row != null) ? 'value="' . $dsp_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-3">
                    <label>Awarded University</label> <label class="err_msg" id="msg"> * </label>
                    <input type="text" class="form-control" id="pd_au0" <?php echo ($pd_row != null) ? 'value="' . $dau_data[0] . '" disabled' : 'value=""'; ?>>
                </div>
                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                    <input type="button" value="Add Row" class="btn btn-dark" style="height: 30px; width:100%;" id="add_pd_row" <?php echo ($pd_row != null) ? ' disabled' : ' '; ?>>
                </div>
            </div>
            <div id="add_pd">
            <?php
                if($pd_row != null){
                    for($i=1; $i<count($dcy_data); $i++){ 
                        if($dcy_data[$i]){?>
                            <div class="form-group d-flex justify-content-between mt-2" id="ddiv_<?php echo $i ?>">
                                <div class="col-md-3">
                                    <label>Completed Year</label>
                                    <input type="number" class="form-control" id="pd_cy<?php echo $i ?>" value="<?php echo $dcy_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Specialization</label>
                                    <input type="text" class="form-control" id="pd_sp<?php echo $i ?>" value="<?php echo $dsp_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-3">
                                    <label>Awarded University</label>
                                    <input type="text" class="form-control" id="pd_au<?php echo $i ?>" value="<?php echo $dau_data[$i]?>" disabled>
                                </div>
                                <div class="col-md-2 d-flex justify-content-end align-items-center mt-3">
                                    <input type="button" value="Delete Row" class="delete_btn btn btn-danger" id="pd_delete<?php echo $i ?>" style="height: 30px; width:100%;" onclick="remove_pd(<?php echo $i ?>)" disabled>
                                </div>
                            </div>
                    <?php }
                    }
                }
            ?>
            </div>



            <div class="form-group mt-4">
            <?php if($ug_row != null){
                    echo '<input type="checkbox" id="ag" checked disabled>&nbsp; I Agree <label class="err_msg" id="agmsg"> * </label>';
                }else{
                    echo '<input type="checkbox" id="ag"> Agree <label class="err_msg" id="agmsg"> * </label>';
                }?>
            </div>

            <!-- <input type="text" value="tab3()" name="tab" hidden> -->
            <div class="form-group d-flex justify-content-end my-4">
                <?php if($ug_row != null){
                    echo '<input type="button" class="btn btn-outline-primary rounded-pill me-4" id="q_ebtn" style="width:175px;" value="Edit" onclick="qenable()">';
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill me-4" id="q_ubtn" style="width:175px; display:none;" value="Update & Next">';
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
        var ug_cy = document.getElementById("ug_cy0")
        var ug_sp = document.getElementById("ug_sp0")
        var ug_au = document.getElementById("ug_au0")

        var pg_cy = document.getElementById("pg_cy0")
        var pg_sp = document.getElementById("pg_sp0")
        var pg_au = document.getElementById("pg_au0")

        var pd_cy = document.getElementById("pd_cy0")
        var pd_sp = document.getElementById("pd_sp0")
        var pd_au = document.getElementById("pd_au0")

        var add_ug_row = document.getElementById("add_ug_row")
        var add_pg_row = document.getElementById("add_pg_row")
        var add_pd_row = document.getElementById("add_pd_row")

        var add_ug = document.getElementById("add_ug")
        var add_pg = document.getElementById("add_pg")
        var add_pd = document.getElementById("add_pd")

        var ag = document.getElementById("ag");
        var ms = document.getElementById("agmsg");

        var ug = 1
        var pg = 1
        var pd = 1

        <?php
        if($ug_row != null){
            echo 'ug =' . count($ucy_data). ';'; 
        };
        if($pg_row != null){
            echo 'pg =' . count($pcy_data). ';'; 
        };
        if($pd_row != null){
            echo 'pd =' . count($dcy_data). ';'; 
        };
        ?>
        


        // Add UG ===============================================================================
        add_ug_row.addEventListener("click",add_ug_function)
        function add_ug_function(){
            if(ug_cy.value.length == 0 || ug_sp.value.length == 0 || ug_au.value.length == 0){
                ug_cy.style.border = "1px solid red"
                ug_sp.style.border = "1px solid red"
                ug_au.style.border = "1px solid red"
                alert("Enter Under Graduation Details")
            }
            else{
                ug_cy.style.border = "1px solid lightgray"
                ug_sp.style.border = "1px solid lightgray"
                ug_au.style.border = "1px solid lightgray"
                
                var umain_div = document.createElement("div")
                umain_div.setAttribute("class","umain_div form-group d-flex justify-content-between mt-2")
                add_ug.appendChild(umain_div)

                // completed Year
                var uc_div = document.createElement("div")
                uc_div.setAttribute("class","col-md-3")
                umain_div.appendChild(uc_div)

                var uc_label = document.createElement("label",)
                uc_div.appendChild(uc_label)

                uc_label.textContent = "Completed Year";

                var ucy = document.createElement('input')
                ucy.setAttribute("type","number")
                ucy.setAttribute("class","form-control")
                ucy.setAttribute("id","ug_cy"+ug)
                uc_div.appendChild(ucy)


                // Specialization
                var us_div = document.createElement("div")
                us_div.setAttribute("class","col-md-3")
                umain_div.appendChild(us_div)

                var us_label = document.createElement("label",)
                us_div.appendChild(us_label)

                us_label.textContent = "Specialization";

                var usp = document.createElement('input')
                usp.setAttribute("class","form-control")
                usp.setAttribute("id","ug_sp"+ug)
                us_div.appendChild(usp)
                

                // Awarded University
                var ua_div = document.createElement("div")
                ua_div.setAttribute("class","col-md-3")
                umain_div.appendChild(ua_div)

                var ua_label = document.createElement("label",)
                ua_div.appendChild(ua_label)

                ua_label.textContent = "Awarded University";

                var uau = document.createElement('input')
                uau.setAttribute("class","form-control")
                uau.setAttribute("id","ug_au"+ug)
                ua_div.appendChild(uau)

                // Remove Btn
                var ubtn_div = document.createElement("div")
                ubtn_div.setAttribute("class","col-md-2 d-flex justify-content-end align-items-end mt-4")
                umain_div.appendChild(ubtn_div)

                var uremove = document.createElement("p")
                uremove.setAttribute("class","delete_btn btn btn-danger mt-1")
                uremove.setAttribute("style","height: 30px; width:100%;")
                uremove.addEventListener("click",ug_delete_function)
                uremove.textContent = "Delete row"
                ubtn_div.appendChild(uremove)

                ug = ug+1
                console.log(ug)
            }
        };
        // Add UG ===============================================================================


        // Delete UG =============================================================================
        function ug_delete_function(e){
            if(e.target.classList.contains('delete_btn')){
                if (confirm("Are you sure  want to delete?")){
                    var p_div = e.target.parentElement.parentElement;
                    add_ug.removeChild(p_div)
                }
            }   
        }
        // Delete UG =============================================================================

        // Delete UG =============================================================================
        function remove_ug(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("udiv_"+value)
                add_ug.removeChild(p_div)
            }
        }
        // Delete UG =============================================================================


        // Add PG ===============================================================================
        add_pg_row.addEventListener("click",add_pg_function)
        function add_pg_function(){
            if(pg_cy.value.length == 0 || pg_sp.value.length == 0 || pg_au.value.length == 0){
                pg_cy.style.border = "1px solid red"
                pg_sp.style.border = "1px solid red"
                pg_au.style.border = "1px solid red"
                alert("Enter Post Graduation Details")
            }
            else{
                pg_cy.style.border = "1px solid lightgray"
                pg_sp.style.border = "1px solid lightgray"
                pg_au.style.border = "1px solid lightgray"

                var pmain_div = document.createElement("div")
                pmain_div.setAttribute("class","pmain_div form-group d-flex justify-content-between mt-2")
                add_pg.appendChild(pmain_div)

                // completed Year
                var pc_div = document.createElement("div")
                pc_div.setAttribute("class","col-md-3")
                pmain_div.appendChild(pc_div)

                var pc_label = document.createElement("label",)
                pc_div.appendChild(pc_label)

                pc_label.textContent = "Completed Year";

                var pcy = document.createElement('input')
                pcy.setAttribute("type","number")
                pcy.setAttribute("class","form-control")
                pcy.setAttribute("id","pg_cy"+pg)
                pc_div.appendChild(pcy)


                // Specialization
                var ps_div = document.createElement("div")
                ps_div.setAttribute("class","col-md-3")
                pmain_div.appendChild(ps_div)

                var ps_label = document.createElement("label",)
                ps_div.appendChild(ps_label)

                ps_label.textContent = "Specialization";

                var psp = document.createElement('input')
                psp.setAttribute("class","form-control")
                psp.setAttribute("id","pg_sp"+pg)
                ps_div.appendChild(psp)
                

                // Awarded University
                var pa_div = document.createElement("div")
                pa_div.setAttribute("class","col-md-3")
                pmain_div.appendChild(pa_div)

                var pa_label = document.createElement("label",)
                pa_div.appendChild(pa_label)

                pa_label.textContent = "Awarded University";

                var pau = document.createElement('input')
                pau.setAttribute("class","form-control")
                pau.setAttribute("id","pg_au"+pg)
                pa_div.appendChild(pau)

                // Remove Btn
                var pbtn_div = document.createElement("div")
                pbtn_div.setAttribute("class","col-md-2 d-flex justify-content-end align-items-end mt-4")
                pmain_div.appendChild(pbtn_div)

                var premove = document.createElement("p")
                premove.setAttribute("class","delete_btn btn btn-danger mt-1")
                premove.setAttribute("style","height: 30px; width:100%;")
                premove.addEventListener("click",pg_delete_function)
                premove.textContent = "Delete row"
                pbtn_div.appendChild(premove)

                pg = pg+1
                console.log(pg)
            }
        };
        // Add PG ===============================================================================


        // Delete PG =============================================================================
        function pg_delete_function(e){
            if(e.target.classList.contains('delete_btn')){
                if (confirm("Are you sure  want to delete?")){
                    var p_div = e.target.parentElement.parentElement;
                    add_pg.removeChild(p_div)
                }
            }   
        }
        // Delete PG =============================================================================

        // Delete PG =============================================================================
        function remove_pg(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("pdiv_"+value)
                add_pg.removeChild(p_div)
            }
        }
        // Delete PG =============================================================================


        // Add Ph. D ===============================================================================
        add_pd_row.addEventListener("click",add_pd_function)
        function add_pd_function(){
            if(pd_cy.value.length == 0 || pd_sp.value.length == 0 || pd_au.value.length == 0){
                pd_cy.style.border = "1px solid red"
                pd_sp.style.border = "1px solid red"
                pd_au.style.border = "1px solid red"
                alert("Enter Ph. D Details")
            }
            else{
                pd_cy.style.border = "1px solid lightgray"
                pd_sp.style.border = "1px solid lightgray"
                pd_au.style.border = "1px solid lightgray"

                var dmain_div = document.createElement("div")
                dmain_div.setAttribute("class","dmain_div form-group d-flex justify-content-between mt-2")
                add_pd.appendChild(dmain_div)

                // completed Year
                var dc_div = document.createElement("div")
                dc_div.setAttribute("class","col-md-3")
                dmain_div.appendChild(dc_div)

                var dc_label = document.createElement("label",)
                dc_div.appendChild(dc_label)

                dc_label.textContent = "Completed Year";

                var dcy = document.createElement('input')
                dcy.setAttribute("type","number")
                dcy.setAttribute("class","form-control")
                dcy.setAttribute("id","pd_cy"+pd)
                dc_div.appendChild(dcy)


                // Specialization
                var ds_div = document.createElement("div")
                ds_div.setAttribute("class","col-md-3")
                dmain_div.appendChild(ds_div)

                var ds_label = document.createElement("label",)
                ds_div.appendChild(ds_label)

                ds_label.textContent = "Specialization";

                var dsp = document.createElement('input')
                dsp.setAttribute("class","form-control")
                dsp.setAttribute("id","pd_sp"+pd)
                ds_div.appendChild(dsp)
                

                // Awarded University
                var da_div = document.createElement("div")
                da_div.setAttribute("class","col-md-3")
                dmain_div.appendChild(da_div)

                var da_label = document.createElement("label",)
                da_div.appendChild(da_label)

                da_label.textContent = "Awarded University";

                var dau = document.createElement('input')
                dau.setAttribute("class","form-control")
                dau.setAttribute("id","pd_au"+pd)
                da_div.appendChild(dau)

                // Remove Btn
                var dbtn_div = document.createElement("div")
                dbtn_div.setAttribute("class","col-md-2 d-flex justify-content-end align-items-end mt-4")
                dmain_div.appendChild(dbtn_div)

                var dremove = document.createElement("p")
                dremove.setAttribute("class","delete_btn btn btn-danger mt-1")
                dremove.setAttribute("style","height: 30px; width:100%;")
                dremove.addEventListener("click",pd_delete_function)
                dremove.textContent = "Delete row"
                dbtn_div.appendChild(dremove)

                pd = pd+1
                console.log(pd)
            }
        };
        // Add Ph. D ===============================================================================


        // Delete Ph. D =============================================================================
        function pd_delete_function(e){
            if(e.target.classList.contains('delete_btn')){
                if (confirm("Are you sure  want to delete?")){
                    var p_div = e.target.parentElement.parentElement;
                    add_pd.removeChild(p_div)
                }
            }   
        }
        // Delete Ph. D =============================================================================

        // Delete Ph. D =============================================================================
        function remove_pd(value){
            if (confirm("Are you sure  want to delete?")){
                var p_div = document.getElementById("ddiv_"+value)
                add_pd.removeChild(p_div)
            }
        }
        // Delete Ph. D =============================================================================


        // UG Details =============================================================
        today = new Date().getFullYear();
        function ug_details(ug){
                if(ug_cy.value.length == 0 || ug_sp.value.length == 0 || ug_au.value.length == 0){
                    ug_cy.style.border = "1px solid red"
                    ug_sp.style.border = "1px solid red"
                    ug_au.style.border = "1px solid red"
                    alert("Enter Under-Graduation Details")
                    return false
                }
                else{
                    var regex = /^[a-z A-Z,\-_]+$/;
                    if(regex.test(ug_sp.value) & regex.test(ug_au.value)){
                        if(ug_cy.value.length == 4  && ug_cy.value < today){
                            ug_cy.style.border = "1px solid lightgray"
                            ug_sp.style.border = "1px solid lightgray"
                            ug_au.style.border = "1px solid lightgray"
                        }else{    
                            alert("Enter Under-Graduation Valid Completed Year")
                            return false
                        }
                    }
                    else{
                        ug_cy.style.border = "1px solid red"
                        ug_sp.style.border = "1px solid red"
                        ug_au.style.border = "1px solid red"
                        alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                        return false
                    }
                }
            // }
        };
        // UG Details =============================================================


        // PG Details =============================================================
        function pg_details(pg){
                if(pg_cy.value.length == 0 || pg_sp.value.length == 0 || pg_au.value.length == 0){
                    pg_cy.style.border = "1px solid red"
                    pg_sp.style.border = "1px solid red"
                    pg_au.style.border = "1px solid red"
                    alert("Enter Post-Graduation Details")
                    return false
                }
                else{
                    var regex = /^[a-z A-Z,\-_]+$/;
                    if(regex.test(pg_sp.value) & regex.test(pg_au.value)){
                        if(pg_cy.value.length == 4 && pg_cy.value < today){
                            pg_cy.style.border = "1px solid lightgray"
                            pg_sp.style.border = "1px solid lightgray"
                            pg_au.style.border = "1px solid lightgray"
                        }else{
                            alert("Enter Post-Graduation Valid Completed Year")
                            return false
                        }
                    }else{
                        pg_cy.style.border = "1px solid red"
                        pg_sp.style.border = "1px solid red"
                        pg_au.style.border = "1px solid red"
                        alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                        return false
                    }
                }
            // }
        };
        // PG Details =============================================================


        // PD Details =============================================================
        function pd_details(pd){
                if(pd_cy.value.length == 0 || pd_sp.value.length == 0 || pd_au.value.length == 0){
                    pd_cy.style.border = "1px solid red"
                    pd_sp.style.border = "1px solid red"
                    pd_au.style.border = "1px solid red"
                    alert("Enter Ph.D Details")
                    return false
                }
                else{
                    var regex = /^[a-z A-Z,\-_]+$/;
                    if(regex.test(pd_sp.value) & regex.test(pd_au.value)){
                        if(pd_cy.value.length == 4 && pd_cy.value < today){
                            pd_cy.style.border = "1px solid lightgray"
                            pd_sp.style.border = "1px solid lightgray"
                            pd_au.style.border = "1px solid lightgray"
                        }
                        else{
                            alert("Enter Ph.D Valid Completed Year")
                            return false
                        }
                    }else{
                        pd_cy.style.border = "1px solid red"
                        pd_sp.style.border = "1px solid red"
                        pd_au.style.border = "1px solid red"
                        alert("Only these (Alphabets, '-' '_' and ',') are allowed")
                        return false
                    }
                }
            // }
        };
        // PD Details =============================================================


        // agree ==================================================================================
        function ag_function(){
            if(ag.checked){
            }
            else{
                fields("Select Agree")
                ms.innerHTML = "* Required field"
                return false
            }
        };
        // agree ==================================================================================


        // Validation ==============================================================
        function qvalidation(){
            if(ug_details(ug) == false){
                return false
            }
            if(pg_details(pg) == false){
                return false
            }
            if(pd_details(pd) == false){
                return false
            }
            if(ag_function() == false){
                return false
            }
            else{
                return true
            }
        }
        // Validation ==============================================================


        // Enable ==================================================================================
        function qenable(){
            document.getElementById("q_ebtn").style.display = "none";
            document.getElementById("q_ubtn").style.display = "block";
            add_ug_row.removeAttribute("disabled");
            add_pg_row.removeAttribute("disabled");
            add_pd_row.removeAttribute("disabled");
            ag.removeAttribute("disabled");
            ag.removeAttribute("checked");
            <?php
            if($ug_row != null){
                for($i=0; $i<count($ucy_data); $i++){
                    echo 'document.getElementById("ug_cy'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("ug_sp'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("ug_au'.$i.'").removeAttribute("disabled");';
                    if($i>0){
                        echo 'document.getElementById("ug_delete'.$i.'").removeAttribute("disabled");';
                    }
                }
            }

            if($pg_row != null){
                for($i=0; $i<count($pcy_data); $i++){
                    echo 'document.getElementById("pg_cy'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("pg_sp'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("pg_au'.$i.'").removeAttribute("disabled");';
                    if($i>0){
                        echo 'document.getElementById("pg_delete'.$i.'").removeAttribute("disabled");';
                    }
                }
            }

            if($pd_row != null){
                for($i=0; $i<count($dcy_data); $i++){
                    echo 'document.getElementById("pd_cy'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("pd_sp'.$i.'").removeAttribute("disabled");';
                    echo 'document.getElementById("pd_au'.$i.'").removeAttribute("disabled");';
                    if($i>0){
                        echo 'document.getElementById("pd_delete'.$i.'").removeAttribute("disabled");';
                    }
                }
            }
            ?>
        }
        // Enable ==================================================================================


        // send data ====================================================================
        $(document).ready(function (e) {
            $("#q_form").on('submit',(function(e) {
                e.preventDefault();
                if(qvalidation()){
                    console.log(ug+"_"+pg+"_"+pd+"submitted!!");
                    var ug_cy_data = "";
                    var ug_sp_data = "";
                    var ug_au_data = "";
                    for(let x = 0;x<ug;x++){
                        if(document.getElementById("ug_cy"+x)){
                            if(document.getElementById("ug_cy"+x).value != "" & document.getElementById("ug_sp"+x).value != "" & document.getElementById("ug_au"+x).value != ""){
                                ug_cy_data = ug_cy_data + document.getElementById("ug_cy"+x).value+"<>";;
                                ug_sp_data = ug_sp_data + document.getElementById("ug_sp"+x).value+"<>";;
                                ug_au_data = ug_au_data + document.getElementById("ug_au"+x).value+"<>";;
                            }
                        }
                    }
                    var pg_cy_data = "";
                    var pg_sp_data = "";
                    var pg_au_data = "";
                    for(let x = 0;x<pg;x++){
                        if(document.getElementById("pg_cy"+x)){
                            if(document.getElementById("pg_cy"+x).value != "" &  document.getElementById("pg_sp"+x).value != "" & document.getElementById("pg_au"+x).value != ""){
                                pg_cy_data = pg_cy_data + document.getElementById("pg_cy"+x).value+"<>";;
                                pg_sp_data = pg_sp_data + document.getElementById("pg_sp"+x).value+"<>";;
                                pg_au_data = pg_au_data + document.getElementById("pg_au"+x).value+"<>";;
                            }
                        }
                    }
                    var pd_cy_data = "";
                    var pd_sp_data = "";
                    var pd_au_data = "";
                    for(let x = 0;x<pd;x++){
                        if(document.getElementById("pd_cy"+x)){
                            if(document.getElementById("pd_cy"+x).value != "" & document.getElementById("pd_sp"+x).value != "" & document.getElementById("pd_au"+x).value != ""){
                                pd_cy_data = pd_cy_data + document.getElementById("pd_cy"+x).value+"<>";;
                                pd_sp_data = pd_sp_data + document.getElementById("pd_sp"+x).value+"<>";;
                                pd_au_data = pd_au_data + document.getElementById("pd_au"+x).value+"<>";;
                            }
                        }
                    }
                    // console.log(ug_cy_data,ug_sp_data,ug_au_data);
                    var qData = '{"Under Graduation":"'+ug_cy_data+';'+ug_sp_data+';'+ug_au_data+'","Post Graduation":"'+pg_cy_data+';'+pg_sp_data+';'+pg_au_data+'","Ph.D":"'+pd_cy_data+';'+pd_sp_data+';'+pd_au_data+'"}';
                    console.log(qData);
                    $.ajax({
                        url: "apis/insert_qualifications.php",
                        type: "POST",
                        data: {f:qData},
                        beforeSend:function(){
                            // Extra
                        },
                        success: function(data){
                            // alert(data);
                            if(data.trim()[data.length-1] =="y"){
                                localStorage.setItem('myParameterValue', data);
                                location.reload();
                            }else{
                                alert("tryagain");
                            }
                        }
                    });
                }
            }));
        });
        // send data ====================================================================

</script>
</body>
</html>