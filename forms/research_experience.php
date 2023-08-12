<?php
    if(isset($_SESSION['ApplicationId'])){
        $rid = $_SESSION['ApplicationId'];
        $row = "";
        $q1 = mysqli_query($con,"SELECT * FROM `researchexp` where `ApplicationId` = '$rid'");
        $count = mysqli_num_rows($q1);
        if($count!=0){
            $row = mysqli_fetch_row($q1);
        }
?>
<html>
<body>
    <!-- Tab - 4 -->
    <div class="col-md-10 box">
        <h3 class="mt-2">Research Experience</h3>
        <hr>
        <form method="post" id="r_form">
            <div class="form-group d-flex justify-content-between mt-4">
                <div class="col-md-5">
                    <label>Papers Published in Peer Reviewed Journals</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="National" id="papers_national" onkeyup="total_papers()" <?php echo(($row)) ? 'value="'.$row[2].'"disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="International" id="papers_international" onkeyup="total_papers()" <?php echo(($row)) ? 'value="'.$row[3].'"disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="papers_total" value="<?php if($row){echo $row[2]+$row[3];}else{echo "0";}?>" disabled>
                </div>
            </div>
            <!-- ---------------------------- -->
            <div class="form-group d-flex justify-content-between">
                <div class="pap_info" style="width: 87.4%;">
                    <label>Mention the Journals/Papers/Articles Published</label> <label class="err_msg" id="msg"> * </label>
                    <textarea class="form-control" id="papers_info" name="papers_info" <?php echo(($row)) ? 'disabled' : "" ?>><?php echo(($row)) ? $row[4] : "" ?></textarea>
                </div>
                <div class="col-md-1">
                </div>
            </div>
            <!-- ---------------------------- -->
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Number of Patents</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Patents" id="patents" <?php echo(($row)) ? 'value="'.$row[5].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>Number of Books with ISBN</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Books with ISBN" id="books" <?php echo(($row)) ? 'value="'.$row[6].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                </div>
            </div>
            <hr>
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Number of Research Projects</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Major" id="projects_major" onkeyup="total_projects()" <?php echo(($row)) ? 'value="'.$row[7].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="Minor" id="projects_minor" onkeyup="total_projects()" <?php echo(($row)) ? 'value="'.$row[8].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="projects_total" value="<?php if($row){echo $row[7]+$row[8];}else{echo "0";}?>" disabled>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Funds Sanctioned/Utilized for research projects in (Rs. Lakhs)</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Funds for Major" id="funds_major" onkeyup="total_funds()" <?php echo(($row)) ? 'value="'.$row[9].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="Funds for Minor" id="funds_minor" onkeyup="total_funds()" <?php echo(($row)) ? 'value="'.$row[10].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="funds_total" value="<?php if($row){echo $row[9]+$row[10];}else{echo "0";}?>" disabled>
                </div>
            </div>
            <!------------------------------------->
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Number of Projects Completed</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Projects Completed" id="projects_completed" <?php echo(($row)) ? 'value="'.$row[11].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>Number of Reports Submitted for mentioned projects</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Reports Submitted" id="reports_submitted" <?php echo(($row)) ? 'value="'.$row[12].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1"></div>
            </div>
            <!--------------------------------------->
            <hr>
            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Number of M. Phils/M. Tech Projects Guided</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="M.Phils Guided" id="mpg" <?php echo(($row)) ? 'value="'.$row[13].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>Number of Ph. D's Guided</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="Ph. Ds Guided" id="pdg" <?php echo(($row)) ? 'value="'.$row[14].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1"></div>
            </div>


            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Seminars/Conferences attended/Papers presented</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="National" id="seminars_national" onkeyup="total_seminars()" <?php echo(($row)) ? 'value="'.$row[15].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="International" id="seminars_international" onkeyup="total_seminars()" <?php echo(($row)) ? 'value="'.$row[16].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="seminars_total" value="<?php if($row){echo $row[15] +$row[16];}else{echo "0";}?>" disabled>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-5">
                    <label>Details of Memberships in professional Societies/Bodies</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="National" id="bodies_national" onkeyup="total_bodies()" <?php echo(($row)) ? 'value="'.$row[17].'" disabled' : "" ?>>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="International" id="bodies_international" onkeyup="total_bodies()" <?php echo(($row)) ? 'value="'.$row[18].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="bodies_total" value="<?php if($row){echo $row[17]+$row[18];}else{echo "0";}?>" disabled>
                </div>
            </div>

            <div class="form-group d-flex justify-content-between">
                <div class="col-md-3">
                    <label>Number of Reputed Awards</label> <label class="err_msg" id="msg"> * </label>
                    <input type="number" class="form-control" placeholder="State" id="awards_state" onkeyup="total_awards()" <?php echo(($row)) ? 'value="'.$row[19].'" disabled' : "" ?>>
                </div>
                <div class="col-md-3 ms-3 nra">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="National" id="awards_national" onkeyup="total_awards()" <?php echo(($row)) ? 'value="'.$row[20].'" disabled' : "" ?>>
                </div>
                <div class="col-md-3 ms-3 nra">
                    <label>&nbsp;</label>
                    <input type="number" class="form-control" placeholder="International" id="awards_international" onkeyup="total_awards()" <?php echo(($row)) ? 'value="'.$row[21].'" disabled' : "" ?>>
                </div>
                <div class="col-md-1">
                    <label>Total</label>
                    <input type="text" class="form-control" id="awards_total" value="<?php if($row){echo $row[19]+$row[20]+$row[21];}else{echo "0";}?>" disabled>
                </div>
            </div>

            <div class="form-group mt-4">
                <input type="checkbox" id="agr" <?php echo (($row != null)) ? "checked disabled" : "" ?>>&nbsp;  <label for="agr">I Confirm to the above details</label>  <label class="err_msg" id="agrmsg"> * </label>
            </div>
            <div class="form-group d-flex justify-content-end my-4">
                <?php if($row != null){
                    echo '<input type="button" class="btn btn-outline-primary rounded-pill me-4" id="r_ebtn" style="width:175px;" value="Edit" onclick="renable()">';
                    echo '<input type="submit" class="btn btn-outline-dark rounded-pill me-4" id="r_ubtn" style="width:175px; display:none;" value="Update & Next">';
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
        
        var papers_national = document.getElementById("papers_national")
        var papers_international = document.getElementById("papers_international")
        var papers_total = document.getElementById("papers_total")

        var papers_info = document.getElementById("papers_info")

        var patents = document.getElementById("patents")
        var books = document.getElementById("books")

        var projects_major = document.getElementById("projects_major")
        var projects_minor = document.getElementById("projects_minor")
        var projects_total = document.getElementById("projects_total")

        var funds_major = document.getElementById("funds_major")
        var funds_minor = document.getElementById("funds_minor")
        var funds_total = document.getElementById("funds_total")

        var projects_completed = document.getElementById("projects_completed")
        var reports_submitted = document.getElementById("reports_submitted")

        var mpg = document.getElementById("mpg")
        var pdg = document.getElementById("pdg")
        
        var awards_state = document.getElementById("awards_state")
        var awards_national = document.getElementById("awards_national")
        var awards_international = document.getElementById("awards_international")
        var awards_total = document.getElementById("awards_total")

        var seminars_national = document.getElementById("seminars_national")
        var seminars_international = document.getElementById("seminars_international")
        var seminars_total = document.getElementById("seminars_total")

        var bodies_national = document.getElementById("bodies_national")
        var bodies_international = document.getElementById("bodies_international")
        var bodies_total = document.getElementById("bodies_total")

        var agr = document.getElementById("agr")
        var msggg = document.getElementById("agrmsg")

        // papers ==========================================================================
        function papers(){
            papers_international.addEventListener('change',papers)
            if(papers_national.value.length == 0){
                papers_national.style.border = "1px solid red"
                fields("Enter Papers Published in Peer Reviewed Journals")
                return false
            }
            else{
                papers_national.style.border = "1px solid lightgray"
            }

            if(papers_international.value.length == 0){
                papers_international.style.border = "1px solid red"
                fields("Enter Papers Published in Peer Reviewed Journals")
                return false
            }
            else{
                papers_international.style.border = "1px solid lightgray"
            }
        };

        function total_papers(){
            if(papers_national.value.length == 0 || papers_international.value.length == 0){
                papers_total.value = 0
            }
            else{
                papers_total.value = +papers_national.value + +papers_international.value
            }
        };
        // papers ==========================================================================


        // papers info ==========================================================================
        function papers_information(){
            papers_info.addEventListener('change',papers)
            if(papers_info.value.length == 0){
                papers_info.style.border = "1px solid red"
                fields("Enter Papers Information")
                return false
            }
            else{
                papers_info.style.border = "1px solid lightgray"
            }
        };

        function total_papers(){
            if(papers_national.value.length == 0 || papers_international.value.length == 0){
                papers_total.value = 0
            }
            else{
                papers_total.value = +papers_national.value + +papers_international.value
            }
        };
        // papers info ==========================================================================


        // patents ==========================================================================
        function patents_function(){
            patents.addEventListener('change',patents_function)
            if(patents.value.length == 0){
                patents.style.border = "1px solid red"
                fields("Enter Number of Patents")
                return false
            }
            else{
                patents.style.border = "1px solid lightgray"
            }
        };
        // patents ==========================================================================

        
        // books ===========================================================================
        function books_function(){
            books.addEventListener('change',books_function)
            if(books.value.length == 0){
                books.style.border = "1px solid red"
                fields("Enter Number of Books with ISBN")
                return false
            }
            else{
                books.style.border = "1px solid lightgray"
            }
        };
        // books ===========================================================================


        // projects ==========================================================================
        function projects(){
            projects_minor.addEventListener('change',projects)
            if(projects_major.value.length == 0){
                projects_major.style.border = "1px solid red"
                fields("Number of Research Projects completed")
                return false
            }
            else{
                projects_major.style.border = "1px solid lightgray"
            }

            if(projects_minor.value.length == 0){
                projects_minor.style.border = "1px solid red"
                fields("Number of Research Projects completed")
                return false
            }
            else{
                projects_minor.style.border = "1px solid lightgray"
            }
        };

        function total_projects(){
            if(projects_major.value.length == 0 || projects_minor.value.length == 0){
                projects_total.value = 0
            }
            else{
                projects_total.value = +projects_major.value + +projects_minor.value
            }
        };
        // projects ==========================================================================


        // funds ==========================================================================
        function funds(){
            funds_minor.addEventListener('change',funds)
            if(funds_major.value.length == 0){
                funds_major.style.border = "1px solid red"
                fields("Funds Sanctioned for research projects")
                return false
            }
            else{
                funds_major.style.border = "1px solid lightgray"
            }

            if(funds_minor.value.length == 0){
                funds_minor.style.border = "1px solid red"
                fields("Funds Sanctioned for research projects")
                return false
            }
            else{
                funds_minor.style.border = "1px solid lightgray"
            }
        };

        function total_funds (){
            if(funds_major.value.length == 0 || funds_minor.value.length == 0){
                funds_total.value = 0
            }
            else{
                funds_total.value = +funds_major.value + +funds_minor.value
            }
        };
        // funds ==========================================================================


        // Projects Completed ===============================================================
        function projects_status(){
            projects_completed.addEventListener('change',projects_status)
            if(projects_completed.value.length == 0){
                projects_completed.style.border = "1px solid red"
                fields("Enter Number of Projects Completed")
                return false
            }
            else{
                projects_completed.style.border = "1px solid lightgray"
            }
        }
        // Projects Completed ===============================================================


        // Reports Submitted ===============================================================
        function reports_status(){
            reports_submitted.addEventListener('change',reports_status)
            if(reports_submitted.value.length == 0){
                reports_submitted.style.border = "1px solid red"
                fields("Enter Number of Reports Submitted")
                return false
            }
            else{
                reports_submitted.style.border = "1px solid lightgray"
            }
        }
        // Reports Submitted ===============================================================


        // M.Phils ==========================================================================
        function mpg_function(){
            mpg.addEventListener('change',mpg_function)
            if(mpg.value.length == 0){
                mpg.style.border = "1px solid red"
                fields("Enter Number of M. Phils Guided")
                return false
            }
            else{
                mpg.style.border = "1px solid lightgray"
            }
        };
        // M.Phils ==========================================================================


        // Ph. Ds ===========================================================================
        function pdg_function(){
            pdg.addEventListener('change',pdg_function)
            if(pdg.value.length == 0){
                pdg.style.border = "1px solid red"
                fields("Enter Number of Ph. Ds Guided")
                return false
            }
            else{
                pdg.style.border = "1px solid lightgray"
            }
        };
        // Ph. Ds ===========================================================================


        // awards ==========================================================================
        function awards(){
            awards_international.addEventListener('change',awards)
            if(awards_state.value.length == 0){
                awards_state.style.border = "1px solid red"
                fields("Number of Reputed Awards")
                return false
            }
            else{
                awards_state.style.border = "1px solid lightgray"
            }

            if(awards_national.value.length == 0){
                awards_national.style.border = "1px solid red"
                fields("Number of Reputed Awards")
                return false
            }
            else{
                awards_national.style.border = "1px solid lightgray"
            }

            if(awards_international.value.length == 0){
                awards_international.style.border = "1px solid red"
                fields("Number of Reputed Awards")
                return false
            }
            else{
                awards_international.style.border = "1px solid lightgray"
            }
        };

        function total_awards(){
            if(awards_state.value.length == 0 || awards_national.value.length == 0 || awards_international.value.length == 0){
                awards_total.value = 0
            }
            else{
                awards_total.value = +awards_state.value + +awards_national.value + +awards_international.value
            }
        };
        // awards ==========================================================================


        // seminars ==========================================================================
        function seminars(){
            seminars_international.addEventListener('change',seminars)
            if(seminars_national.value.length == 0){
                seminars_national.style.border = "1px solid red"
                fields("Seminars/Conferences attended/Papers presented")
                return false
            }
            else{
                seminars_national.style.border = "1px solid lightgray"
            }

            if(seminars_international.value.length == 0){
                seminars_international.style.border = "1px solid red"
                fields("Seminars/Conferences attended/Papers presented")
                return false
            }
            else{
                seminars_international.style.border = "1px solid lightgray"
            }
        };

        function total_seminars(){
            if(seminars_national.value.length == 0 || seminars_international.value.length == 0){
                seminars_total.value = 0
            }
            else{
                seminars_total.value = +seminars_national.value + +seminars_international.value
            }
        };
        // seminars ==========================================================================


        // bodies ==========================================================================
        function bodies(){
            bodies_international.addEventListener('change',bodies)
            if(bodies_national.value.length == 0){
                bodies_national.style.border = "1px solid red"
                fields("Details of Memberships in professional Socities/Bodies")
                return false
            }
            else{
                bodies_national.style.border = "1px solid lightgray"
            }

            if(bodies_international.value.length == 0){
                bodies_international.style.border = "1px solid red"
                fields("Details of Memberships in professional Socities/Bodies")
                return false
            }
            else{
                bodies_international.style.border = "1px solid lightgray"
            }
        };

        function total_bodies(){
            if(bodies_national.value.length == 0 || bodies_international.value.length == 0){
                bodies_total.value = 0
            }
            else{
                bodies_total.value = +bodies_national.value + +bodies_international.value
            }
        };
        // bodies ==========================================================================


        // agree ==========================================================================
        function agr_function(){
            if(agr.checked){
            }
            else{
                fields("Select Agree")
                msggg.innerHTML = "* Required field"
                return false
            }
        }
        // agree ==========================================================================


        // Validation ======================================================================
        function rvalidation(){
            if(papers() == false){return false}
            if(papers_information() == false){return false}
            if(patents_function() == false){return false}
            if(books_function() == false){return false}
            if(projects() == false){return false}
            if(funds() == false){return false}
            if(projects_status() == false){return false}
            if(reports_status() == false){return false}
            if(mpg_function() == false){return false}
            if(pdg_function() == false){return false}
            if(seminars() == false){return false}
            if(bodies() == false){return false}
            if(agr_function() == false){return false}
            if(awards() == false){return false}
            else{return true}
        };
        // Validation ======================================================================


        // Enable =========================================================================
        function renable(){
            document.getElementById("r_ebtn").style.display = "none";
            document.getElementById("r_ubtn").style.display = "block";
            agr.removeAttribute("disabled");
            agr.removeAttribute("checked");
            papers_national.removeAttribute("disabled");
            papers_international.removeAttribute("disabled");
            papers_info.removeAttribute("disabled");
            patents.removeAttribute("disabled");
            books.removeAttribute("disabled");
            projects_major.removeAttribute("disabled");
            projects_minor.removeAttribute("disabled");
            funds_major.removeAttribute("disabled");
            funds_minor.removeAttribute("disabled");
            projects_completed.removeAttribute("disabled");
            reports_submitted.removeAttribute("disabled");
            mpg.removeAttribute("disabled");
            pdg.removeAttribute("disabled");
            awards_state.removeAttribute("disabled");
            awards_national.removeAttribute("disabled");
            awards_international.removeAttribute("disabled");
            seminars_national.removeAttribute("disabled");
            seminars_international.removeAttribute("disabled");
            bodies_national.removeAttribute("disabled");
            bodies_international.removeAttribute("disabled");
        }
        // Enable =========================================================================
        
        $(document).ready(function (e) {
            $("#r_form").on('submit',(function(e) {
                e.preventDefault();
                if(rvalidation()){
                    //---------
                    var rData = $("#papers_national").val().trim()+"><"+
                        $("#papers_international").val().trim()+"><"+
                        $("#papers_info").val().trim()+"><"+
                        $("#patents").val().trim()+"><"+
                        $("#books").val().trim()+"><"+
                        $("#projects_major").val().trim()+"><"+
                        $("#projects_minor").val().trim()+"><"+
                        $("#funds_major").val().trim()+"><"+
                        $("#funds_minor").val().trim()+"><"+
                        $("#projects_completed").val().trim()+"><"+
                        $("#reports_submitted").val().trim()+"><"+
                        $("#mpg").val().trim()+"><"+
                        $("#pdg").val().trim()+"><"+
                        $("#seminars_national").val().trim()+"><"+
                        $("#seminars_international").val().trim()+"><"+
                        $("#bodies_national").val().trim()+"><"+
                        $("#bodies_international").val().trim()+"><"+
                        $("#awards_state").val().trim()+"><"+
                        $("#awards_national").val().trim()+"><"+
                        $("#awards_international").val().trim();
                        // alert(rData);
                    //---------
                    $.ajax({
                        url: "apis/insert_researchDetails.php",
                        type: "POST",
                        data: {r:rData},
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
    </script>
    <!-- Java Script -->
    
</body>
</html>
<?php
    }
?>