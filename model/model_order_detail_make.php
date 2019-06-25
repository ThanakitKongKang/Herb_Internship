<?php
include "connect.php";
// get lastest order_id from order_history
$get_order_id = $pdo->prepare("SELECT * FROM order_history ORDER BY order_id DESC LIMIT 1");
$get_order_id->execute();
$lastest_order_id = $get_order_id->fetch();
if ($lastest_order_id['order_id'] == null) {
    $lastest_order_id['order_id'] = 1;
}

// get product stock remain
$get_product_stock = $pdo->prepare("SELECT product_stock FROM product WHERE product_id = ?");
$get_product_stock->bindParam(1, $_POST['product_id']);
$get_product_stock->execute();
$product_stock_current = $get_product_stock->fetch();
// calculate stock remain
$product_stock_remain = $product_stock_current['product_stock'] - $_POST['count'];

// stock updating
$update_product_stock = $pdo->prepare("UPDATE product SET product_stock = ? WHERE product_id = ?");
$update_product_stock->bindParam(1, $product_stock_remain);
$update_product_stock->bindParam(2, $_POST['product_id']);
$update_product_stock->execute();

// echo $product_stock_current['product_stock']."<br>";



// add order_detail
$make_order_detail = $pdo->prepare("INSERT INTO order_detail VALUES ( ?, ?, ?, ?, ?) ");
$make_order_detail->bindParam(1, $lastest_order_id['order_id']);
$make_order_detail->bindParam(2, $_POST['product_id']);
$make_order_detail->bindParam(3, $_POST['count']);
$make_order_detail->bindParam(4, $_POST['product_price']);
$make_order_detail->bindParam(5, $_POST['product_cost']);
$make_order_detail->execute();
echo "<pre> product_id : " . $_POST['product_id'] . "</pre>";
echo "<pre> count : " . $_POST['count'] . "</pre>";
echo "<pre> product_price : " . $_POST['product_price'] . "</pre>";
echo "<pre> product_cost : " . $_POST['product_cost'] . "</pre>";
echo "<pre> order_id : " . $lastest_order_id['order_id'] . " </pre>";

