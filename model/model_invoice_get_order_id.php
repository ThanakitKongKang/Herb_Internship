<?php
include "connect.php";
$getOrderId = $pdo->prepare("SELECT order_id FROM  order_history
ORDER BY order_id DESC LIMIT 1");
$getOrderId->execute();
$lastOrderId = $getOrderId->fetch();
echo $lastOrderId['order_id'];
