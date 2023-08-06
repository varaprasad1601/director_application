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
    @media screen and (max-width:400px){
        .campus_detail{
            flex-direction: column !important;
            width: 100% !important;
            padding: 0px !important;
        }
    }
</style>

<?php
$uid = $_SESSION['ApplicationId'];
$campus_data = mysqli_query($con,"SELECT `appliedCampus` FROM `applied_campus` where `ApplicationId` = '$uid'");
$campus = mysqli_fetch_row($campus_data);
?>

<div class="container-fluid">
    <!-- PAGE - 1 -->
<div class="row justify-content-center align-items-center" id="page-1">
    <div class="col-md-10 box campus py-1 mt-4 px-4 bg-white">
        <div class="col-md-12 campus_detail d-flex">
            <div class="col-md-4 field px-4">
                <label>Applicant ID:</label>
                <input type="text" class="form-control" name="user" id="user" value="<?php echo $_SESSION['ApplicationId'];?>" disabled>
            </div>
            <div class="col-md-4 field px-4">
                <label>Name of the Post</label>
                <input type="text" class="form-control field" name="post" value="Director" disabled>
            </div>
            <div class="col-md-4 field px-4">
                <label>Name of the Campus Applied for</label>
                <select class="form-control" name="campus" id="campus">
                    <?php
                    if($campus != null){ ?>
                        <option class="options" value="Nuzvid"<?php echo (($campus[0] == 'Nuzvid')) ? 'selected' : '' ?>>Nuzvid</option>
                        <option class="options" value="RK Valley"<?php echo (($campus[0] == 'RK Valley')) ? 'selected' : '' ?>>RK Valley</option>
                        <option class="options" value="Srikakulam"<?php echo (($campus[0] == 'Srikakulam')) ? 'selected' : '' ?>>Srikakulam</option>
                        <option class="options" value="Ongole"<?php echo (($campus[0] == 'Ongole')) ? 'selected' : '' ?>>Ongole</option>
                    <?php }else{
                        echo '<option class="options" value="-----">Select</option>;';
                        echo '<option class="options" value="Nuzvid">Nuzvid</option>;';
                        echo '<option class="options" value="RK Valley">RK Valley</option>;';
                        echo '<option class="options" value="Srikakulam">Srikakulam</option>;';
                        echo '<option class="options" value="Ongole">Ongole</option>;';
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var alert_campus = 0

    function campus_check(){
        if($("#campus").val() != "-----"){
            alert_campus = 1
        }
    }
    campus_check()


    $(document).ready(function(){
        $("#campus").change(function(){
            var campus = $("#campus").val().trim();

            if(campus != "-----"){
                $.ajax({
                    type:"POST",
                    url:"apis/insert_page1.php",
                    data:{c:campus},
                    success:function(data){
                        if(data=="S"){
                            alert("Selected "+campus+" campus for Application..!!");
                            location.reload();
                        }else{
                            alert(data);
                        }
                    }
                });
            }else{
                alert("Select campus")
            }
        });
    });
</script>