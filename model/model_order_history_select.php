<?php
$listHistory = $pdo->prepare("SELECT * FROM  order_detail , order_history ,product 
WHERE order_detail.order_id = order_history.order_id 
AND order_detail.product_id = product.product_id
AND order_history.status = 'uncancelled'
ORDER BY order_history.order_id DESC
");
$listHistory->execute();
