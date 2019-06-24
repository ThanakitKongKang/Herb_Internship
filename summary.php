<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

?>

<head>

    <title>สรุปผล</title>
</head>

<body>
    <div class="container">
        <div class="my-3">
            <div class="row">
                <div class="col d-flex buttons">
                 
                    <input id="date1" type="date" class="ml-auto form-control" style="width:17.5%">
                    <span class='text-white mt-2 ml-1'>ถึง</span>
                    <input id="date2" type="date" class="ml-2 form-control" style="width:17.5%;z-index:-1;background-color:#ccc">
                </div>

            </div>
        </div>

        <div id="content">
            <h1 class="text-center text-white" style="position:absolute;top:50%;left:30%">กรุณาเลือกวันที่เพื่อแสดงเนื้อหา</h1>

        </div>

</body>
<script>
    $(document).ready(function() {

        $('.buttons').on("change", "#date1", function(event) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("content").innerHTML = this.responseText;
                }
            };

            var date1 = document.getElementById("date1").value;
            var date2 = document.getElementById("date2").value;
            if (date2 == "") {
                document.getElementById("date2").style.zIndex = 1;
                document.getElementById("date2").style.backgroundColor = "#fff";
                xmlhttp.open("GET", "./model/model_summary_select.php?mode=date&date1=" + date1, true);
            } else {
                xmlhttp.open("GET", "./model/model_summary_select.php?mode=date&date1=" + date1 + "&date2=" + date2, true);
            }


            xmlhttp.send();
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
            xmlhttp.open("GET", "./model/model_summary_select.php?mode=date&date1=" + date1 + "&date2=" + date2, true);
            xmlhttp.send();
        })

        // $('#product_potent').on('keyup', function() {
        //     console.log(this.value);
        //     alert("awdawd");
        // });

    });
</script>