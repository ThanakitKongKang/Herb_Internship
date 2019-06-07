<?php  //include from root php's style
include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/head.php");

?>

<head>
    <title>หน้าหลัก</title>
</head>

<body>
    <?php
    include($_SERVER['DOCUMENT_ROOT'] . "/herb_internship/model/model_product.php");
    $listProduct = getListProduct($pdo); //call function
    //print
    while ($rowListProduct = $listProduct->fetch()) {
        print("<pre>" . print_r($rowListProduct, true) . "</pre>");
    }

    ?>

</body>

</html>