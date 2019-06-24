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
                <div class="col justify-content-center d-flex buttons">
                    <button class="btn btn-light" id="summary_day">รายวัน</button>
                    <button class="btn btn-light mx-1" id="summary_month">รายเดือน</button>
                    <button class="btn btn-light" id="summary_year">รายปี</button>
                </div>

            </div>
        </div>

        <div id="content">
            <h1 class="text-center">กรุณาคลิกเลือกเนื้อหาที่จะแสดง</h1>
        </div>

</body>
<script>
    $(document).ready(function() {

        $('.buttons').on("click", "#summary_day", function(event) {
            document.getElementById("content").innerHTML="<h1 class='text-center'>day</h1>";
        })

        $('.buttons').on("click", "#summary_month", function(event) {
            document.getElementById("content").innerHTML="<h1 class='text-center'>month</h1>";
        })

        $('.buttons').on("click", "#summary_year", function(event) {
            document.getElementById("content").innerHTML="<h1 class='text-center'>year</h1>";
        })

        // $('#product_potent').on('keyup', function() {
        //     console.log(this.value);
        //     alert("awdawd");
        // });

    });
</script>