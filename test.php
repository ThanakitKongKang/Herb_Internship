<?php  //include from root php's style
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/herb_internship/head.php";
include_once($path);

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