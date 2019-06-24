<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
// $year = date('Y', time());
// $month = date('m', time());
// $day = date('d', time());
$time = date('Y-m-d', time());

?>

<body>
    <input type="text" id="product_potent">
</body>
<script>
    $(document).ready(function() {
        $('#product_potent').on('keyup', function() {
            console.log(this.value);
            alert("awdawd");
        });

    });
    
</script>