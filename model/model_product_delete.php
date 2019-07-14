<?php
include "connect.php";
$stmt = $pdo->prepare("DELETE FROM product WHERE product_id = ?");
$stmt->bindParam(1, $_POST['product_id']);
$stmt->execute();

$checkIfDeleteSucceed = $pdo->prepare("SELECT product_id FROM product WHERE product_id = ?");
$checkIfDeleteSucceed->bindParam(1, $_POST['product_id']);
$checkIfDeleteSucceed->execute();
if ($checkIfDeleteSucceed->rowCount() > 0) {
    echo "1";
} else {
    echo "2";
}
