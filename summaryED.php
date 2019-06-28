<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>

    <title>รายงานผลประกอบการ ED</title>
    <style>
        .table th,
        .table td {
            padding: 0rem 1rem 0rem 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="my-3">
            <div class="row">

                <div class="col d-flex buttons">
                    <button class="btn btn-success" id="print-button" style="visibility:hidden;" onclick="printJS({ printable: 'content', type: 'html', style: 'td {text-align: center;}' })"><i class="fas fa-file-export"></i> print</button>
                    <input id="date1" type="date" class="ml-auto form-control" style="width:17.5%">
                    <span class='text-white mt-2 ml-1'>ถึง</span>
                    <input id="date2" type="date" class="ml-2 form-control" style="width:17.5%;z-index:-1;background-color:#ccc">
                </div>

            </div>
        </div>

        <div id="content">

            <!-- <h1 class="text-center text-white" style="margin-top:20%;" id="text-date-choose">กรุณาเลือกวันที่เพื่อแสดงเนื้อหา</h1> -->
        </div>
        <!-- <a href="print.php" target="_blank" style="visibility:hidden" id="go-print"></a> -->
    </div>
</body>
<script>
    $(document).ready(function() {
        please_choose = "<h1 class='text-center text-white' style='margin-top:20%;' id='text-date-choose'>กรุณาเลือกวันที่เพื่อแสดงเนื้อหา</h1>";
        document.getElementById("content").innerHTML = please_choose;

        $('.buttons').on("change", "#date1", function(event) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };

            var date1 = document.getElementById("date1").value;
            var date2 = document.getElementById("date2").value;
            const c_date1 = new Date(date1);
            const c_date2 = new Date(date2);
            const diffTime = c_date2.getTime() - c_date1.getTime();
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

            if (date2 == "" && date1 != "" || diffDays == 0) {
                document.getElementById("print-button").style.visibility = "visible";
                document.getElementById("date2").style.zIndex = 1;
                document.getElementById("date2").style.backgroundColor = "#fff";
                xmlhttp.open("GET", "./model/model_summary_select.php?page=ED&mode=date&date1=" + date1, true);
                xmlhttp.send();
            } else if (date1 == "") {
                document.getElementById("content").innerHTML = please_choose;
                document.getElementById("print-button").style.visibility = "hidden";
                document.getElementById("date2").style.zIndex = -1;
                document.getElementById("date2").style.backgroundColor = "#ccc";
                document.getElementById("date2").value = "";

            } else if (diffDays < 0) {
                document.getElementById("print-button").style.visibility = "hidden";
                document.getElementById("content").innerHTML = "<h1 class='text-center text-danger' style='margin-top:20%;' id='text-date-choose'>มีข้อผิดพลาด! วันที่ไม่ถูกต้อง</h1>";

            } else {
                xmlhttp.open("GET", "./model/model_summary_select.php?page=ED&mode=date&date1=" + date1 + "&date2=" + date2, true);
                xmlhttp.send();
            }



        })

        $('.buttons').on("change", "#date2", function(event) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };
            var date1 = document.getElementById("date1").value;
            var date2 = document.getElementById("date2").value;

            const c_date1 = new Date(date1);
            const c_date2 = new Date(date2);
            const diffTime = c_date2.getTime() - c_date1.getTime();
            const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
            // console.log(diffDays);

            if (date2 != "" && diffDays > 0) {
                document.getElementById("print-button").style.visibility = "visible";
                xmlhttp.open("GET", "./model/model_summary_select.php?page=ED&mode=date&date1=" + date1 + "&date2=" + date2, true);
                xmlhttp.send();

            } else if (diffDays < 0) {
                document.getElementById("print-button").style.visibility = "hidden";
                document.getElementById("content").innerHTML = "<h1 class='text-center text-danger' style='margin-top:20%;' id='text-date-choose'>มีข้อผิดพลาด! วันที่ไม่ถูกต้อง</h1>";

            } else {
                xmlhttp.open("GET", "./model/model_summary_select.php?page=ED&mode=date&date1=" + date1, true);
                xmlhttp.send();
            }

        })

        $('#text-date-choose').on('click', function() {
            document.getElementById("date1").focus();
        });

        // $('.buttons').on("click", "#print-button", function(event) {
        //     var table_data = $('#content').html();
        //     localStorage.setItem("content", table_data);
        //     document.getElementById("go-print").click();
        // })


    });
</script>