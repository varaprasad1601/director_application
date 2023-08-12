<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Director Recruitment</title>
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body{
            margin: 0px !important;
            /* overflow-x: hidden; */
        }
        .form-control:focus{
            box-shadow: none;
            border: 1px solid gray;
        }
        .btn:focus{
            box-shadow: none;
        }
        label{
            font-size: 14px;  
            margin-bottom: 4px;
        }
        .form-control{
            font-size: 14px;
            padding: 4px 10px !important;
            margin-bottom: 10px;
        }
        .form-control:disabled{
            background-color: whitesmoke;
        }
        .form-control:read-only{
            background-color: whitesmoke;
        }
        .btn{
            font-size: 14px;
            padding: 4px 30px;
        }
        @media screen and (max-width: 600px){
            .box{
                width: 95% !important;
            }
            .tab-text{
                font-size: 5.5px !important;
                top: -26px !important;
            }
            .checkpoint{
                width: 10px !important;
                height: 10px !important;
                border: 2px solid gray !important;
            }
            .checkedpoint{
                width: 10px !important;
                height: 10px !important;
                border: 2px solid black !important;
            }
            .check{
                /* color: red !important; */
                font-size: 5px !important;
                top: 0.05em !important;
            }
            .checkline{
                height: 1px !important;
            }
            .checkedpoint + .checkline{
                height: 2px !important;
            } 
            .form-group{
                flex-direction: column !important;
            }
            .checkbox{
                justify-content: start !important;
            }
            .btn{
                width:100% !important;
            }
            .space{
                margin-top: 15px !important;
            }
            .box{
                padding: 0px !important;
            }
            .tabs{
                width: 80% !important;
            }
            .nra{
                margin-left: 0px !important;
            }

        }
        .checkpoint{
            width: 20px;
            height: 20px;
            cursor: pointer;
            border: 3px solid gray;
            border-radius: 50%;
            color: white;
        }
        .checkedpoint{
            width: 20px;
            height: 20px;
            cursor: pointer;
            border: 3px solid black;
            border-radius: 50%;
            color: white;
            background-color: black;
        }
        .checkedpoint + .checkline{
            background-color: black;
            height: 4px;
        }
        .checkedpoint > .tab-text{
            color: black;
        }
        .checkline{
            width: 25%;
            height: 3px;
            background-color: gray;
        }
        .tab-text{
            color: gray;
            position: relative;
            line-height: 16px;
            text-align: center;
            top: -50px;
            font-family: 'Calibri';
            font-weight: 700;
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .check{
            color: white;
            position:relative;
            top: -2.6px;
            font-weight: bold;
            font-size: 13px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        *{
            user-select: none;
        }
        .err_msg{
            color: red;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- PAGE - 2 -->
        <?php if($tab == "tab7()"){?>
        <div class="row justify-content-center align-items-center my-5">

            <!-- Tab - 7 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" id="tab7">
                <?php
                    include "../preview.php"
                ?>
            </div>

        </div>
        <?php }else{ ?>
        <div class="row justify-content-center align-items-center my-5" id="page-2">

            <!-- Check Points -->
            <div class="col-md-10 box tabs d-flex justify-content-between align-items-center my-3" id="tabs">
                <div class="checkpoint" id="checkpoint1" onclick="tab1()"><span class="check">✓</span><p class="tab-text">Personal&nbsp;Details</p></div>
                <div class="checkline"></div>
                <div class="checkpoint" id="checkpoint2"><span class="check">✓</span><p class="tab-text">Qualifications</p></div>
                <div class="checkline"></div>
                <div class="checkpoint" id="checkpoint3"><span class="check">✓</span><p class="tab-text">Teaching&nbsp;Experience</p></div>
                <div class="checkline"></div>
                <div class="checkpoint" id="checkpoint4"><span class="check">✓</span><p class="tab-text">Research&nbsp;Experience</p></div>
                <div class="checkline"></div>
                <div class="checkpoint" id="checkpoint5"><span class="check">✓</span><p class="tab-text">Administrative&nbsp;Positions</p></div>
            </div>

            <!-- Tab - 1 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: flex" id="tab1">
                <?php
                    include "personal_details.php"
                ?>
            </div>

            <!-- Tab - 2 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: none" id="tab2">
                <?php
                    include "qualification.php"
                ?>
            </div>

            <!-- Tab - 3 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: none" id="tab3">
                <?php
                    include "teaching_experience.php"
                ?>
            </div>

            <!-- Tab - 4 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: none;" id="tab4">
                <?php
                    include "research_experience.php"
                ?>
            </div>
            
            <!-- Tab - 5 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: none" id="tab5">
                <?php
                    include "administrative_positions.php"
                ?>
            </div>

            <!-- Tab - 6 -->
            <div class="col-md-10 box rounded shadow justify-content-center py-5" style="display: none" id="tab6">
                <?php
                    if($tab == "tab6()" || $tab == "tab7()"){
                        include "../preview.php";
                    }
                ?>
            </div>

        </div>
        <?php } ?>
        <!-- PAGE - 2 -->
    </div>

    <!-- Java Script -->
    <script>

        function preview(){
            tab6();
            location.reload()
        }

        // Tabs ==========================================================================
        var cp1 = document.getElementById("checkpoint1");
        var cp2 = document.getElementById("checkpoint2");
        var cp3 = document.getElementById("checkpoint3");
        var cp4 = document.getElementById("checkpoint4");
        var cp5 = document.getElementById("checkpoint5");
        var t1 = document.getElementById("tab1");
        var t2 = document.getElementById("tab2");
        var t3 = document.getElementById("tab3");
        var t4 = document.getElementById("tab4");
        var t5 = document.getElementById("tab5");
        var t6 = document.getElementById("tab6");
        var t7 = document.getElementById("tab7");
        var tabs = document.getElementById("tabs");


        // Tab - 1 =======================================
        function tab1(){
            cp1.setAttribute("onclick","tab1()");

            cp1.classList.remove("checkedpoint");
            cp2.classList.remove("checkedpoint");
            cp3.classList.remove("checkedpoint");
            cp4.classList.remove("checkedpoint");
            cp5.classList.remove("checkedpoint");

            t1.style.display = "flex"
            t2.style.display = "none"
            t3.style.display = "none"
            t4.style.display = "none"
            t5.style.display = "none"
            t6.style.display = "none"

            tab_num = 0
        };
        // Tab - 1 =======================================


        // Tab - 2 =======================================
        function tab2(){
            cp1.setAttribute("onclick","tab1()");
            cp2.setAttribute("onclick","tab2()");

            cp1.classList.add("checkedpoint")

            cp2.classList.remove("checkedpoint")
            cp3.classList.remove("checkedpoint")
            cp4.classList.remove("checkedpoint")
            cp5.classList.remove("checkedpoint")

            t2.style.display = "flex"
            t1.style.display = "none"
            t3.style.display = "none"
            t4.style.display = "none"
            t5.style.display = "none"
            t6.style.display = "none"

            tab_num = 0
        };
        // Tab - 2 =======================================


        // Tab - 3 =======================================
        function tab3(){
            cp1.setAttribute("onclick","tab1()");
            cp2.setAttribute("onclick","tab2()");
            cp3.setAttribute("onclick","tab3()");

            cp1.classList.add("checkedpoint")
            cp2.classList.add("checkedpoint")

            cp3.classList.remove("checkedpoint")
            cp4.classList.remove("checkedpoint")
            cp5.classList.remove("checkedpoint")

            t3.style.display = "flex"
            t1.style.display = "none"
            t2.style.display = "none"
            t4.style.display = "none"
            t5.style.display = "none"
            t6.style.display = "none"

            tab_num = 0
        };
        // Tab - 3 =======================================


        // Tab - 4 =======================================
        function tab4(){
            cp1.setAttribute("onclick","tab1()");
            cp2.setAttribute("onclick","tab2()");
            cp3.setAttribute("onclick","tab3()");
            cp4.setAttribute("onclick","tab4()");

            cp1.classList.add("checkedpoint")
            cp2.classList.add("checkedpoint")
            cp3.classList.add("checkedpoint")

            cp4.classList.remove("checkedpoint")
            cp5.classList.remove("checkedpoint")

            t4.style.display = "flex"
            t1.style.display = "none"
            t2.style.display = "none"
            t3.style.display = "none"
            t5.style.display = "none"
            t6.style.display = "none"

            tab_num = 0
        };
        // Tab - 4 =======================================


        // Tab - 5 =======================================
        function tab5(){
            cp1.setAttribute("onclick","tab1()");
            cp2.setAttribute("onclick","tab2()");
            cp3.setAttribute("onclick","tab3()");
            cp4.setAttribute("onclick","tab4()");
            cp5.setAttribute("onclick","tab5()");

            cp1.classList.add("checkedpoint")
            cp2.classList.add("checkedpoint")
            cp3.classList.add("checkedpoint")
            cp4.classList.add("checkedpoint")

            cp5.classList.remove("checkedpoint")

            t5.style.display = "flex"
            t1.style.display = "none"
            t2.style.display = "none"
            t3.style.display = "none"
            t4.style.display = "none"
            t6.style.display = "none"

            tab_num = 0
        };
        // Tab - 5 =======================================


        // Tab - 6 =======================================
        function tab6(){
            cp1.setAttribute("onclick","tab1()");
            cp2.setAttribute("onclick","tab2()");
            cp3.setAttribute("onclick","tab3()");
            cp4.setAttribute("onclick","tab4()");
            cp5.setAttribute("onclick","tab5()");

            cp1.classList.add("checkedpoint")
            cp2.classList.add("checkedpoint")
            cp3.classList.add("checkedpoint")
            cp4.classList.add("checkedpoint")
            cp5.classList.add("checkedpoint")

            t6.style.display = "flex"
            t1.style.display = "none"
            t2.style.display = "none"
            t3.style.display = "none"
            t4.style.display = "none"
            t5.style.display = "none"

            tab_num = 6
        };
        // Tab - 6 =======================================


        // Tab - 7 =======================================
        function tab7(){
            console.log("tab7() Called")
        };
        // Tab - 7 =======================================
        // Tabs ==========================================================================

        <?php 
            echo $tab;
        ?>

    </script>
    <!-- Java Script -->
    
</body>
</html>