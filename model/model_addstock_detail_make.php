<?php
include "connect.php";
// get lastest order_id from order_history
date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
// echo "The current server timezone is: " . $timezone;
$date = date('Y/m/d h:i:s', time());
// echo "<br>The current time is: " . $date;

// add stock_detail
$make_order_detail = $pdo->prepare("INSERT INTO stock_detail VALUES ( NULL, ?, ?, ?, ?) ");
$make_order_detail->bindParam(1, $date);
$make_order_detail->bindParam(2, $_POST['product_id']);
$make_order_detail->bindParam(3, $_POST['count']);
$make_order_detail->bindParam(4, $_SESSION['user']);
$make_order_detail->execute();

echo "<pre> product_price : " .  $date . "</pre>";
echo "<pre> product_id : " . $_POST['product_id'] . "</pre>";
echo "<pre> count : " . $_POST['count'] . "</pre>";
echo "<pre> user : " . $_SESSION['user'] . "</pre>";
// echo $lastest_order_id['order_id'];

// get new product stock
$product_stock_new=  $_POST['product_stock'] + $_POST['count'];

// stock updating
$update_product_stock = $pdo->prepare("UPDATE product SET product_stock = ? WHERE product_id = ?");
$update_product_stock->bindParam(1, $product_stock_new);
$update_product_stock->bindParam(2, $_POST['product_id']);
$update_product_stock->execute();
