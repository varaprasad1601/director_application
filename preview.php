<?php
    include 'fetch_details.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate" />
    <meta http-equiv="Pragma" content="no-cache" />
    <meta http-equiv="Expires" content="0" />
    
    <title>Document</title>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
    <style>
        *{
            font-family: 'Calibri';
        }
        .text{
            font-size: 18px;
        }
        @page {
            size: A4; /* or 'letter', 'legal', 'A3', etc. */
            margin: 20px 0px !important; /* Set your desired margin values here */
            margin-top: 32px !important;
        }
        .modal-box{
            position: fixed;
            top: 0px;
            left:0px;
            background: rgba(0, 0, 0, 0.3);
            width: 100%;
            height: 100%;
            display: none;
        }


        .post_g, .re_exp, .search{page-break-inside:avoid; page-break-after:auto }

        @media print{
            :not(.preview), :not(.preview *){visibility: hidden;}
            #print_heading{display:none !important;}
            .note_label{display: none !important;}
            .selected_campuses{display: none !important;}
            .print_campus{visibility: hidden !important;}
            .hide_btn{visibility: hidden !important;}
            .text{font-size: 14px;}
            .preview, .preview *{visibility: visible;}
            .preview{position: absolute; top: 0; left: 0; padding: 0px 40px;}
            .heading{width:80%; padding-top: 8px !important;}
            .rgukt{width: 10%;}
            .logo{width: 100%;}
            .gov{width: 10%;}
            .gov_logo{width: 90%; margin-top: 2px !important;}
            .heading-1{font-size: 17.5px !important;}
            .heading-2{font-size: 12px !important; line-height: 0px;}
            .heading-3{font-size: 12px !important; line-height: 5px;}
            .pdetails{justify-content: space-between;}
            .details{width: 70% !important;}
            .head{padding: 0px;}
            .image{width: 25% !important;}
            .signature{display: flex !important;}
            .left-line{width: 42% !important;}
            .right-line{width: 42% !important;}
            .end-line{display: flex !important;}
            /* .texp{margin-top: 0px !important;} */
            .otinf{margin-top: 0px !important;}
            .q{width: 30%;}
            .a{width: 65%;}
            .tq{width: 45%;}
            .ta{width: 55%;}
            .qd{width: 33.3%;}
            .qyc{width: 25%;}
            .qpg{width: 37.5%;}
            .qpg{width: 37.5%;}
            .qf{width: 20%;}
            .qt{width: 20%;}
            .qu{width: 40%;}
            .qc{width: 20%;}
            .n{width: 50%;}
            .nv{width: 50%;}
            .i{width: 50%;}
            .iv{width: 50%;}
            .t{width: 30%;}
            .tv{width: 70%;}
            .ap{width: 50%;}
            .af{width: 25%;}
            .at{width: 25%;}
            <?php if(count($ucy_data)<2){ echo ".pgg{margin-top: 25px !important;}"; }?>
        }
        @media screen and (max-width:600px){
            .heading{width:80%; padding-top: 15px !important;}
            .rgukt{width: 10% !important;}
            .logo{width: 85% !important;}
            .gov{width: 10% !important;}
            .gov_logo{width: 100%;}
            .preview{width: 100%; padding:0px;}
            .header{padding:10px !important;}
            .pad{padding:0px !important;}
            .head{padding: 0px !important;}
            .heading-1{font-size: 7px !important;}
            .heading-2{font-size: 5px !important; margin-top: -10px !important;}
            .heading-3{font-size: 5px !important; margin-top: -13px !important;}
            .text{font-size: 10px;}
            .form-head{font-size: 15px !important;}
            .pdetails{ flex-direction: column-reverse; padding: 20px 0px !important;}
            .declaration{ padding: 20px 0px !important;}
            .details{ justify-content: space-between;}
            .btns{width: 100% !important;}
            .click_btn{width: 100% !important; margin-top: 30px !important; margin-bottom: 50px;}
            .print_campus{margin: 0px !important; width: 100% !important;}
            .btns_height{flex-direction: column !important;}
            .modal_in_box{padding: 20px !important;}
            .modal-box{padding: 10px !important;}
            .q{width: 35%;}
            .a{width: 65%;}
            .tq{width: 65%;}
            .ta{width: 35%;}
            .qd{width: 35%;}
            .qf{width: 20%;}
            .qt{width: 20%;}
            .qu{width: 40%;}
            .qc{width: 20%;}
            .n{width: 65%;}
            .nv{width: 35%;}
            .i{width: 65%;}
            .iv{width: 35%;}
            .t{width: 30%;}
            .tv{width: 70%;}
            .ap{width: 50%;}
            .af{width: 25%;}
            .at{width: 25%;}
            .image{margin-bottom: 10px; padding-bottom: 20px; border-bottom: 1px solid lightgray; display: flex; justify-content: center;}
            .img{width:70% !important}
            @page {
                size: A4 !important; /* or 'letter', 'legal', 'A3', etc. */
                margin: 20px 0px !important; /* Set your desired margin values here */
                /* padding: 50px !important; */
            }
            @media print{
                .preview{
                    background-color: red !important;
                }
            }
        }
    </style>
</head>
<body>
    <div class="container-fluid" id="content">
        <div class="container-fluid preview" id="preview">
            <div class="row header pad">
                <div class="col-dm-12 d-flex head pb-3 px-0" style="border-bottom:1px solid lightgray;">
                    <div class="col-md-1 rgukt d-flex justify-content-center align-items-center">
                        <img src="./logo.png" class="logo" width="86">
                    </div>
                    <div class="col-md-10 justify-content-center pt-2 heading" style="color: #560207; text-align:center;">
                        <p style="font-size: 25px; font-family:'Arial' !important; font-weight:bold;" class="heading-1">Rajiv Gandhi University of Knowledge Technologies - Andhra Pradesh</p>
                        <p style="font-family:'Arial' !important;line-height:0;" class="heading-2">Catering to the Educational Needs of Gifted Rural Youth of Andhra Pradesh</p>
                        <p style="font-family:'Arial' !important;" class="heading-3">(Established by the Govt. of Andhra Pradesh and recognized as per Section 2(f) of UGC Act, 1956)</p>
                    </div>
                    <div class="col-md-1 gov d-flex justify-content-center align-items-center">
                        <img src="./gov_logo.png" class="gov_logo" width="80">
                    </div>
                </div>
            </div>
            <div class="row pad">
                <div class="col-md-12 justify-content-center mt-3 pad">
                    <div><center><h5><b class="form-head">RGUKT Director Recruitment Application</b></h5></center></div>
                    <div class="col-md-12 basic mt-5">
                        <label class="text">Application Id: <span style="color: red;"><?php echo $uid?></span></label>
                    </div>
                    <div class="col-md-12">
                        <label class="text">Name of the Post: Director</label>
                    </div>
                    <div class="col-md-12">
                        <?php 
                            $selected_campuses = explode(",",$campus[0]);
                            // print_r($selected_campuses);
                            $final_campuse = "";
                            for($f= 0; $f<count($selected_campuses);$f++){
                                if($selected_campuses[$f]){
                                        $final_campuse = $final_campuse . $selected_campuses[$f].', ';
                                }
                            };
                            $final_campuses = substr($final_campuse, 0, -2);
                        ?>
                    <label class="text selected_campuses">Applied Campuses: <?php echo $final_campuses ?></label>
                    <label class="text selected_campus" id="selected_campus"></label>
                    </div>

                    <!-- Personal Details ================================================== -->
                    <div class="col-md-12 mt-5" style="border-bottom:1px solid lightgray;">
                        <h3>Personal Details</h3>
                    </div>
                    <div class="col-md-12 d-flex pdetails justify-content-between px-5 py-4">
                        <div class="col-md-8 details">
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Name</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[2] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Email Id</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[3] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Mobile Number</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[4] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Date of Birth</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[6] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Age</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[7] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Gender</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[8] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Social Status</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[9] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Address</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[10] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Present Designation</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[11] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Department</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[12] ?></label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 q"><label class="text">Organization Name</label></div>
                                <div class="col-md-8 a"><label class="text"><?php echo $pd_row[13] ?></label></div>
                            </div>
                        </div>
                        <div class="col-md-3 image">
                            <img src="./apis/pic_uploads/<?php echo $pd_row[5];?>" class="img" style="width: 100%;">
                        </div>
                    </div>
                    <!-- Personal Details ================================================== -->

                    <!-- Qualification Details ================================================== -->
                    <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                        <h3>Qualification Details</h3>
                    </div>
                    <div class="col-md-12 pdetails justify-content-between px-5 py-4">
                        <div class="col-md-12 pdetails justify-content-between">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Under Graduation</h5>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between under_g" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-3 qd qyc"><label class="text"><b>Year of Completion</b></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><b>Specialization</b></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><b>Awarded University</b></label></div>
                            </div>
                            <?php for ($i=0; $i<count($ucy_data); $i++){?>
                                <div class="col-md-12 d-flex justify-content-between mb-2" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-3 qd qyc"><label class="text"><?php echo $ucy_data[$i] ?></label></div>
                                    <div class="col-md-4 qd qpg"><label class="text"><?php echo $usp_data[$i] ?></label></div>
                                    <div class="col-md-4 qd qpg"><label class="text"><?php echo $uau_data[$i] ?></label></div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="post_g">
                            <div class="col-md-12 pgg mt-5 mb-3" style="border-bottom:1px solid lightgray;">
                                <h5 class="">Post Graduation</h5>
                            </div>
                            <div class="col-md-12 d-flex justify-content-between mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-3 qd qyc"><label class="text"><b>Year of Completion</b></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><b>Specialization</b></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><b>Awarded University</b></label></div>
                            </div>
                            <?php for ($i=0; $i<count($pcy_data); $i++){?>
                                <div class="col-md-12 d-flex justify-content-between mb-2" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-3 qd qyc"><label class="text"><?php echo $pcy_data[$i] ?></label></div>
                                    <div class="col-md-4 qd qpg"><label class="text"><?php echo $psp_data[$i] ?></label></div>
                                    <div class="col-md-4 qd qpg"><label class="text"><?php echo $pau_data[$i] ?></label></div>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-md-12 mt-5 mb-3" style="border-bottom:1px solid lightgray;">
                            <h5 class="">Ph. D</h5>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between mb-2" style="border-bottom: .5px solid #eeeee4">
                            <div class="col-md-3 qd qyc"><label class="text"><b>Year of Completion</b></label></div>
                            <div class="col-md-4 qd qpg"><label class="text"><b>Specialization</b></label></div>
                            <div class="col-md-4 qd qpg"><label class="text"><b>Awarded University</b></label></div>
                        </div>
                        <?php for ($i=0; $i<count($dcy_data); $i++){?>
                            <div class="col-md-12 d-flex justify-content-between mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-3 qd qyc"><label class="text"><?php echo $dcy_data[$i] ?></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><?php echo $dsp_data[$i] ?></label></div>
                                <div class="col-md-4 qd qpg"><label class="text"><?php echo $dau_data[$i] ?></label></div>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- Qualification Details ================================================== -->

                    <!-- Teaching Experience ================================================== -->
                    <div class="col-md-12 mt-4 texp" style="border-bottom:1px solid lightgray;">
                        <h3>Teaching Experience</h3>
                    </div>
                    <div class="col-md-12 pdetails justify-content-between px-5 py-4 search">
                        <div class="col-md-12 mb-2">
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-5 tq"><label class="text">Total Teaching Experience</label></div>
                                <div class="col-md-7 ta"><label class="text"><?php echo $td_row[2] ?> Years</label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-5 tq"><label class="text">Total Length of service as professor as on date</label></div>
                                <div class="col-md-7 ta"><label class="text"><?php echo $td_row[3] ?> Years</label></div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-5 tq"><label class="text">Total Leftover service before super annuation</label></div>
                                <div class="col-md-7 ta"><label class="text"><?php echo $td_row[4]?> Years</label></div>
                            </div>
                        </div>
                    </div>
                    <!-- Teaching Experience ================================================== -->

                    <!-- Working Experience ================================================== -->
                    <!-- <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                        <h3>Working Experience</h3>
                    </div> -->
                    <div class="col-md-12 pdetails justify-content-between px-5 py-4">
                        <div class="col-md-12 mb-2">
                            <div class="search">
                            <?php if($pr_row){
                                if($pda_data[0] != null){?>
                                <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                    <h5 class="">Professor</h5>
                                </div>
                                <div class="col-md-12 d-flex mb-2 under_g" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-2 qf"><label class="text"><b>From</b></label></div>
                                    <div class="col-md-2 qt"><label class="text"><b>To</b></label></div>
                                    <div class="col-md-5 qu"><label class="text"><b>University</b></label></div>
                                    <div class="col-md-2 qc"><label class="text"><b>College Type</b></label></div>
                                </div>
                                <?php for ($i=0; $i<count($pda_data); $i++){?>
                                    <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                        <div class="col-md-2 qf"><label class="text"><?php echo $pda_data[$i] ?></label></div>
                                        <div class="col-md-2 qt"><label class="text"><?php echo $pto_data[$i] ?></label></div>
                                        <div class="col-md-5 qu"><label class="text"><?php echo $pun_data[$i] ?></label></div>
                                        <div class="col-md-2 qc"><label class="text"><?php echo (($ppc_data[$i] == "True")) ? "Private College" : "--" ?></label></div>
                                    </div>
                                <?php } } ?>
                            <?php  } ?>
                            </div>

                            <div class="search">
                            <?php if($pr_row){
                                if($ada_data[0] != null){ ?>
                                <div class="col-md-12 mb-3 mt-5" style="border-bottom: 1px solid lightgray;">
                                    <h5 class="">Associate Professor</h5>
                                </div>
                                <div class="col-md-12 d-flex mb-2 under_g" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-2 qf"><label class="text"><b>From</b></label></div>
                                    <div class="col-md-2 qt"><label class="text"><b>To</b></label></div>
                                    <div class="col-md-5 qu"><label class="text"><b>University</b></label></div>
                                    <div class="col-md-2 qc"><label class="text"><b>College Type</b></label></div>
                                </div>
                                <?php for ($i=0; $i<count($ada_data); $i++){?>
                                    <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                        <div class="col-md-2 qf"><label class="text"><?php echo $ada_data[$i] ?></label></div>
                                        <div class="col-md-2 qt"><label class="text"><?php echo $ato_data[$i] ?></label></div>
                                        <div class="col-md-5 qu"><label class="text"><?php echo $aun_data[$i] ?></label></div>
                                        <div class="col-md-2 qc"><label class="text"><?php echo (($apc_data[$i] == "True")) ? "Private College" : "--" ?></label></div>
                                    </div>
                                <?php } } ?>
                            <?php  } ?>
                            </div>
                            
                            <div class="search">
                            <?php if($sd_row){
                                if($sda_data[0] != null){ ?>
                                <div class="col-md-12 mb-3 mt-5" style="border-bottom: 1px solid lightgray;">
                                    <h5 class="">Assistant Professor</h5>
                                </div>
                                <div class="col-md-12 d-flex mb-2 under_g" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-2 qf"><label class="text"><b>From</b></label></div>
                                    <div class="col-md-2 qt"><label class="text"><b>To</b></label></div>
                                    <div class="col-md-5 qu"><label class="text"><b>University</b></label></div>
                                    <div class="col-md-2 qc"><label class="text"><b>College Type</b></label></div>
                                </div>
                                <?php for ($i=0; $i<count($sda_data); $i++){?>
                                    <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                        <div class="col-md-2 qf"><label class="text"><?php echo $sda_data[$i] ?></label></div>
                                        <div class="col-md-2 qt"><label class="text"><?php echo $sto_data[$i] ?></label></div>
                                        <div class="col-md-5 qu"><label class="text"><?php echo $sun_data[$i] ?></label></div>
                                        <div class="col-md-2 qc"><label class="text"><?php echo (($spc_data[$i] == "True")) ? "Private College" : "--" ?></label></div>
                                    </div>
                                <?php } } ?>
                            <?php  } ?>
                            </div>
                        </div>
                    </div>
                    <!-- Working Experience ================================================== -->
                    
                    
                    <!-- Administrative Positions ================================================== -->
                    <div class="search">
                        <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                            <h3>Administrative Positions</h3>
                        </div>
                        <div class="col-md-12 pdetails justify-content-between px-5 py-4">
                            <div class="col-md-12 d-flex mb-2 under_g" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-6 ap"><label class="text"><b>Position</b></label></div>
                                <div class="col-md-3 af"><label class="text"><b>From</b></label></div>
                                <div class="col-md-3 at"><label class="text"><b>To</b></label></div>
                            </div>
                            <?php for ($i=0; $i<count($pos_data); $i++){?>
                                <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-6 ap"><label class="text"><?php echo $pos_data[$i] ?></label></div>
                                    <div class="col-md-3 af"><label class="text"><?php echo $from_data[$i] ?></label></div>
                                    <div class="col-md-3 at"><label class="text"><?php echo $to_data[$i] ?></label></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- Administrative Positions ================================================== -->


                    <!-- Research Experience ================================================== -->
                        <div class="col-md-12 search">
                            <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                                <h3>Research Experience</h3>
                            </div>
                            <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                                <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                    <h5 class="">Papers Published in Peer Reviewed Journals</h5>
                                </div>
                                <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-4 d-flex qd">
                                        <div class="col-md-5 n"><label class="text">National:</label></div>
                                        <div class="col-md-7 nv"><label class="text"><?php echo $row[2] ?></label></div>
                                    </div>
                                    <div class="col-md-4 d-flex qd">
                                        <div class="col-md-6 i"><label class="text">International:</label></div>
                                        <div class="col-md-6 iv"><label class="text"><?php echo $row[3] ?></label></div>
                                    </div>
                                    <div class="col-md-4 d-flex qd">
                                        <div class="col-md-4 t"><label class="text">Total:</label></div>
                                        <div class="col-md-8 tv"><label class="text"><?php echo $row[2] + $row[3] ?></label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 search">
                            <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                                <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                    <h5 class="">Journals / Papers / Articles Published</h5>
                                </div>
                                <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                    <div class="col-md-12 d-flex qd">
                                        <div class="col-md-12 nv"><label class="text"><?php echo $row[4] ?></label></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Number of Research Projects completed</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">Major:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[7] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Minor:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[8] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[7] + $row[8] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Funds Sanctioned/Utilized for Completed Research Projects in (Rs. Lakhs)</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">Funds for Major:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[9] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Funds for Minor:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[10] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[9] + $row[10] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Number of Ongoing Research Projects</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">Major:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[11] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Minor:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[12] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[11] + $row[12] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Funds Sanctioned/Utilized for Ongoing Research Projects in (Rs. Lakhs)</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">Funds for Major:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[13] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Funds for Minor:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[14] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[13] + $row[14] ?></label></div>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Number of Reputed Awards</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">State:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[21] ?></label></div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">National:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[22] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">International:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[23] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[21] + $row[22] + $row[23] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Seminars/Conferences attended/Papers presented</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">National:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[17] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">International:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[18] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[17] + $row[18] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Details of Memberships in professional Socities/Bodies</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">National:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[19] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">International:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[20] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-4 t"><label class="text">Total:</label></div>
                                    <div class="col-md-8 tv"><label class="text"><?php echo $row[19] + $row[20] ?></label></div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 pdetails justify-content-between px-5 pt-4 py-2 pb-4 search">
                            <div class="col-md-12 mb-3" style="border-bottom: 1px solid lightgray;">
                                <h5 class="">Other Details</h5>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">Patents:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[5] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Books with ISBN:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[6] ?></label></div>
                                </div>
                            </div>
                            <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-5 n"><label class="text">M.Phils / M.Tech Projects Guided:</label></div>
                                    <div class="col-md-7 nv"><label class="text"><?php echo $row[15] ?></label></div>
                                </div>
                                <div class="col-md-4 d-flex qd">
                                    <div class="col-md-6 i"><label class="text">Ph. D's Guided:</label></div>
                                    <div class="col-md-6 iv"><label class="text"><?php echo $row[16] ?></label></div>
                                </div>
                            </div>
                        </div>
                    <!-- Research Experience ================================================== -->

                    <!-- Cases ============================================================== -->
                    <?php if($cname_data[0] != "" | $cstatus_data[0] != ""){ ?>
                    <div class="search">
                        <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                            <h3 class="">ACB / Vigilance / Criminal / Departmental Cases / Enquiries-Pending</h3>
                        </div>
                        <div class="col-md-12 pdetails justify-content-between px-5 py-4">
                            <div class="col-md-12 d-flex mb-2 under_g" style="border-bottom: .5px solid #eeeee4">
                                <div class="col-md-4 qd"><label class="text"><b>Type of Case</b></label></div>
                                <div class="col-md-4 qd"><label class="text"><b>Name of the Case</b></label></div>
                                <div class="col-md-4 qd"><label class="text"><b>Status of the Case</b></label></div>
                            </div>
                            <?php for ($i=0; $i<count($case_data); $i++){?>
                                <?php if($cname_data[$i] != "" | $cstatus_data[$i] != ""){ ?>
                                    <div class="col-md-12 d-flex mb-2" style="border-bottom: .5px solid #eeeee4">
                                        <div class="col-md-4 qd"><label class="text"><?php echo $case_data[$i] ?></label></div>
                                        <div class="col-md-4 qd"><label class="text"><?php echo $cname_data[$i] ?></label></div>
                                        <div class="col-md-4 qd"><label class="text"><?php echo $cstatus_data[$i] ?></label></div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Cases ============================================================ -->

                    <!-- Other Information ================================================== -->
                    <?php if($orow[1] != null){ ?>
                    <div class="search">
                        <div class="col-md-12 mt-4" style="border-bottom:1px solid lightgray;">
                            <h3>Other Information</h3>
                        </div>
                        <div class="col-md-12 pdetails justify-content-between px-5 py-4" style="text-align: justify;">
                            <label><?php echo $orow[1] ?></label>
                        </div>
                    </div>
                    <?php } ?>
                    <!-- Other Information ================================================== -->


                    <!-- Declaration ================================================== -->
                    <?php if($tab_num[0] == "tab7()"){?>
                        <div class="search mt-4" style="border-top: 1px solid lightgray; text-align:justify">
                        <div class="col-md-12 declaration d-flex justify-content-between px-5 py-4">
                            <div class="me-3"><i class="fa fa-check-square" style="color: black;"></i></div>
                            <div><label><b>I <?php echo $pd_row[2] ?>, Hereby declare that the information entered in this application is true, complete and correct to the best of my knowledge and belief. I have read the rules and also understand that in the event of any information being found false or ineligibility is detacted before or after the selection, My Application is liable to be rejected</b></label></div>
                        </div>
                    </div>
                    <?php }else{ ?>
                    <?php } ?>
                    <!-- Declaration ================================================== -->


                    <!-- Signature ================================================== -->
                    <div class="col-md-12 justify-content-end signature" style="display: none; margin-top: 125px; padding-right:100px;">
                        <label class="text">Signature</label>
                    </div>
                    <div class="col-md-12 justify-content-between align-items-center end-line mt-5 px-5" style="display: none;">
                        <div class="col-md-5 left-line" style="border-bottom: 1px solid lightgray;"></div>
                        <div class="col-md-2 d-flex justify-content-center align-items-center">*** End ***</div>
                        <div class="col-md-5 right-line" style="border-bottom: 1px solid lightgray;"></div>
                    </div>
                    <!-- Signature ================================================== -->


                    <!-- note ================================================== -->
                    <div class="col-md-12 mt-3 d-flex justify-content-center print_campus">
                        
                    </div>
                    <!-- note ================================================== -->


                    <!-- Buttons ================================================== -->
                    <div>
                    <?php if($tab_num[0] == "tab7()"){?>
                    <div class="col-md-12 btns_height mt-5 note_label">
                        <div class="col-md-12"><center><label class="text" style="color: red;">Note: Print this Application Separately for each Applied Campus</label></center></div>
                        <div class="col-md-12 d-flex justify-content-end btns_height">
                            <label id="print_heading" for="camp" style="font-size:1em;display:flex;align-items:end;"> Print Application Form for &nbsp&nbsp</label>
                            <select class="form-control me-3 mb-0 mt-5 print_campus" id="print_campus" style="width: 175px;" name = "camp">
                            <option value="-----">Select Campus</option>
                            <?php
                                for($f= 0; $f<count($selected_campuses);$f++){
                                    if($selected_campuses[$f]){
                                        echo '<option value="'.$selected_campuses[$f].'">'.$selected_campuses[$f].'</option>';
                                    }
                                };
                            ?>
                            </select>
                            <input type="button" class="btn btn-primary me-3 click_btn mt-5 hide_btn" style="width: 175px;" value="Print" onclick="print_doc()">
                        </div>
                        <!-- <input type="button" class="btn btn-warning space click_btn mt-5 hide_btn" style="width: 175px;" value="Download" onclick="download()"> -->
                    </div>
                    <?php }else{ ?>
                        <div class="col-md-12 d-flex justify-content-end">
                            <input type="button" class="btn btn-dark mt-5 click_btn" style="width: 175px;" value="Save Data" onclick="modal()">
                        </div>
                    <?php } ?>
                    <!-- Buttons ================================================== -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ================================================== -->
    <div class="container-fluid modal-box justify-content-center align-items-center" id="mymodal">
        <div class="col-md-5 rounded shadow bg-light p-5 modal_in_box" id="modal-content">
            <div class="col-md-12 mb-4">
                <div class="col-md-12 basic">
                    <label class="text">Application Id: <span style="color: red;"><?php echo $uid?></span></label>
                </div>
                <div class="col-md-12">
                    <label class="text">Name of the Post: Director</label>
                </div>
                <div class="col-md-12">
                    <label class="text">Applied Campuses: <?php echo $final_campuses ?></label>
                </div>
            </div>
            <h5>Declaration</h5>
            <hr>
            <div class="col-md-12 d-flex justify-content-between pb-4">
                <div class="me-3"><input type="checkbox" id="check_declaration"></div>
                <div><label><b>I <?php echo $pd_row[2] ?>, Hereby declare that the information entered in this application is true, complete and correct to the best of my knowledge and belief. I have read the rules and also understand that in the event of any information being found false or ineligibility is detacted before or after the selection, My Application is liable to be rejected</b></label> <span id="err_msg" style="color: red; font-size:14px"></span></div>
            </div>
            <div class="footer d-flex justify-content-end align-items-end mt-2" id="footer">
                <button class="btn btn-success me-3" onclick="agree_model()">I Agree</button>
                <button class="btn btn-danger" onclick="close_model()">Cancel</button>
            </div>
        </div>
    </div>
    <!-- Modal ================================================== -->

    <script>

        $(document).ready(function (e) {
            $("#print_campus").focus();
        })

        function print_doc(){
            var sel_cam = document.getElementById("print_campus").value;
            if($("#print_campus").val() != "-----"){
                $("#print_campus").css("border","1px solid lightgray");
                document.getElementById("selected_campus").innerText = "Applied Campus: "+sel_cam;
                window.print()
            }else{
                alert("Select Campus")
                $("#print_campus").css("border","1px solid red");
            }
        }


        function modal(){
            campus_check()
            if(alert_campus == 0){
                alert("Select Campus");
                $("#nuzvid_campus").css("border","1px solid red !important");
                $(window).scrollTop(0);
                return false
            }
            else{
                $("#mymodal").fadeIn();
                $("#mymodal").css("display","flex");
            }
        }

        function agree_model(){
            var cd = document.getElementById("check_declaration");
            if(cd.checked){
                $con_status = confirm("Once data is saved, it cannot be modified.")
                if($con_status){
                    $.ajax({
                        url: "apis/save_data.php",
                        type: "POST",
                        data: {c:'tab7()'},
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
                else{
                    return false
                }
                $("#mymodal").fadeOut();
            }
            else{
                alert("Select Checkbox")
                $("#err_msg").text("* Required field")
            }
        }

        function close_model(){
            $("#mymodal").fadeOut(function () {
                $("#err_msg").remove("");
            });
        }


        function download(){
                alert("called");
        //         const element = document.getElementById('content'); // Replace 'yourContent' with the ID of the HTML content you want to convert

        //         // Options for the PDF generation (optional)
        //         const options = {
        //         margin: 10,
        //         filename: 'your_filename.pdf',
        //         image: { type: 'jpeg', quality: 0.98 },
        //         html2canvas: { scale: 2 },
        //         jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        // };

        // // Generate the PDF and trigger the download
        // html2pdf().from(element).set(options).save()
        }
    </script>
</body>
</html>