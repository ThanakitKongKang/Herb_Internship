<?php
$listOrderHistory = $pdo->prepare("SELECT * FROM  order_detail , order_history ,product 
WHERE order_detail.order_id = order_history.order_id 
AND order_detail.product_id = product.product_id");
$listOrderHistory->execute();
