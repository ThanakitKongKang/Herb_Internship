<?php
include "connect.php";
$cancel = $pdo->prepare("UPDATE order_history SET status = 'cancelled' WHERE order_id = ?");
$cancel->bindParam(1, $_POST['ord']);
$cancel->execute();

$listOrderDetail = $pdo->prepare("SELECT * FROM order_history,`order_detail` 
WHERE order_history.order_id = order_detail.order_id 
AND order_history.order_id = ?");
$listOrderDetail->bindParam(1, $_POST['ord']);
$listOrderDetail->execute();

while ($rowListProduct = $listOrderDetail->fetch()) {
    $stUpdate = $pdo->prepare("UPDATE product SET product_stock = product_stock + ? WHERE product_id = ?");
    $stUpdate->bindParam(1, $rowListProduct['order_count']);
    $stUpdate->bindParam(2, $rowListProduct['product_id']);
    $stUpdate->execute();
}
