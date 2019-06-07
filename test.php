<!DOCTYPE html>
<?php include "./model/connect.php";
session_start(); ?>
<html>
    
<body>
    <?php
    $stmt = $pdo->prepare("SELECT * FROM product");
    $stmt->execute();
    // $row = $stmt->fetch();
    while ($row = $stmt->fetch()) {
        print("<pre>" . print_r($row, true) . "</pre>");
    }

    ?>

</body>

</html>