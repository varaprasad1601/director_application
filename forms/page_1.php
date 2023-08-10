<style>
    .form-control:focus{
        box-shadow: none;
        border: 1px solid gray;
    }
    label{
        font-size: 14px;  
        margin-bottom: 4px;
    }
    .form-control{
        font-size: 10px;
        padding: 4px 10px !important;
        margin-bottom: 10px;
    }
    .form-control:disabled{
        background-color: whitesmoke;
    }
    .btn{
        font-size: 14px;
        padding: 4px 30px;
    }
    *{
            font-family: 'Calibri';
    }
    .text{
        font-size: 18px;
    }
    @media screen and (max-width:600px){
        .campus_detail{
            flex-direction: column !important;
            width: 100% !important;
            padding: 0px !important;
        }
        .field{
            flex-direction: column !important;
        }
        .cc{
            margin-bottom: 10px !important;
        }
        .che_box{
            width: 87% !important;
        }
        .che_che{
            display: flex;
            justify-content: center;
        }
    }
</style>

<?php
$uid = $_SESSION['ApplicationId'];
$campus_row = mysqli_query($con,"SELECT `appliedCampus` FROM `applied_campus` where `ApplicationId` = '$uid'");
$campus_count = mysqli_num_rows($campus_row);
if($campus_count > 0){
   $campus = mysqli_fetch_row($campus_row); 
    $campus_data = explode(",",$campus[0]);
}
?>

<div class="container-fluid">
    <!-- PAGE - 1 -->
<div class="row justify-content-center align-items-center " id="page-1">
    <div class="col-md-10 box campus py-1 mt-4 px-4 bg-white">
        <div class="col-md-12 campus_detail d-flex">
            <div class="col-md-4 field px-4">
                <label class="text"><b>Applicant ID: </b><?php echo $_SESSION['ApplicationId'];?></label><br>
                <label class="text"><b>Name of the Post: </b>Director</label>
                <!-- <input type="text" class="form-control" name="user" id="user" value="" disabled> -->
            </div>
        </div>
        <div class="che_che">
        <div class="che_box">
            <div class="col-md-12 px-4"><label class="text"><b>Name of the Campus or Campuses Applied for</b></label><input type="text" id="campus_focus" style="width: 0px; height:0px; opacity:0;"><label class="text" id="campus_msg"></label></div>
                <div class="col-md-12 px-4 field d-flex justify-content-between">
                    <div class="check_boxes" style="display: none;">
                        <input type="checkbox" class ="camp" name="campus" id="n_c" value="Nuzvid" <?php echo (($campus_data[0] == 'Nuzvid')) ? 'checked' : '' ?>>
                        <input type="checkbox" class ="camp" name="campus" id="r_c" value="RK Valley" <?php echo (($campus_data[1] == 'RK Valley')) ? 'checked' : '' ?>>
                        <input type="checkbox" class ="camp" name="campus" id="s_c" value="Srikakulam" <?php echo (($campus_data[2] == 'Srikakulam')) ? 'checked' : '' ?>>
                        <input type="checkbox" class ="camp" name="campus" id="o_c" value="Ongole" <?php echo (($campus_data[3] == 'Ongole')) ? 'checked' : '' ?>>
                    </div>
                    <label class="btn btn-<?php echo (($campus_data[0] == 'Nuzvid')) ? 'success' : 'white' ?> border cc" style="width: 23%;" onclick="check_box('nuzvid_campus','n_c')" for="n_c" id="nuzvid_campus">Nuzvid</label>
                    <label class="btn btn-<?php echo (($campus_data[1] == 'RK Valley')) ? 'success' : 'white' ?> border cc" style="width: 23%;" onclick="check_box('rk_campus','r_c')" for="r_c" id="rk_campus">RK Valley</label>
                    <label class="btn btn-<?php echo (($campus_data[2] == 'Srikakulam')) ? 'success' : 'white' ?> border cc" style="width: 23%;" onclick="check_box('srikakulam_campus','s_c')" for="s_c" id="srikakulam_campus">Srikakulam</label>
                    <label class="btn btn-<?php echo (($campus_data[3] == 'Ongole')) ? 'success' : 'white' ?> border" style="width: 23%;" onclick="check_box('ongole_campus','o_c')" for="o_c" id="ongole_campus">Ongole</label>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>
</div>
<script>
    var alert_campus = 0
    var cArr = []
    var cStr = ""
    function check_box(b_id,c_id){
        var check_val = document.getElementById(c_id)
        var box_val = document.getElementById(b_id)
        if(check_val.checked){
            box_val.style.background = "#F8F9FA" ;
            box_val.style.color = "black";
        }else{
            box_val.style.background = "#198754" ;
            box_val.style.color = "white";
            alert("Selected `"+check_val.value+"` campus for Application..!!");
        }
    }


    function campus_check(){
        var nuz_sta = document.getElementById("n_c").checked
        var rkv_sta = document.getElementById("r_c").checked
        var sri_sta = document.getElementById("s_c").checked
        var ong_sta = document.getElementById("o_c").checked
        if(nuz_sta || rkv_sta || sri_sta || ong_sta){
            alert_campus = 1;
        }
    }
    campus_check()



    $(document).ready(function(){
        $("input[name='campus']").click(function(){
            var nuz_stat = document.getElementById("n_c").checked
            var rkv_stat = document.getElementById("r_c").checked
            var sri_stat = document.getElementById("s_c").checked
            var ong_stat = document.getElementById("o_c").checked

            nzd = '';
            rkv = '';
            sri = '';
            ong = '';

            if(nuz_stat == true){
                nzd ='Nuzvid';
            }
            if(rkv_stat == true){
                rkv ='RK Valley';
            }
            if(sri_stat == true){
                sri ='Srikakulam';
            }
            if(ong_stat == true){
                ong ='Ongole';
            }

            var cStr = nzd+","+rkv+","+sri+","+ong

            $.ajax({
                type:"POST",
                url:"apis/insert_page1.php",
                data:{c:cStr},
                success:function(data){
                    if(data=="S"){
                        // alert("Selected `"+cStr+"` campus for Application..!!");
                        location.reload();
                    }else{
                        alert(data);
                    }
                }
            });
        });
    });
</script>