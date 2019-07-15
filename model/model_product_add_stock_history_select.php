<?php
$listHistory = $pdo->prepare("SELECT * FROM  stock_detail ,product 
WHERE stock_detail.product_id = product.product_id");
$listHistory->execute();
