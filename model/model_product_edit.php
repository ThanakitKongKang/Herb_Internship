<?php
include "connect.php";
$stmt = $pdo->prepare("UPDATE product SET product_name = ?, product_type = ?, product_potent = ?, product_amount = ?, product_price = ?, product_price_discount = ?, product_cost = ?, product_stock = ? WHERE product_id = ?");
$stmt->bindParam(1, $_POST['product_name']);
$stmt->bindParam(2, $_POST['product_type']);
$stmt->bindParam(3, $_POST['product_potent']);
$stmt->bindParam(4, $_POST['product_amount']);
$stmt->bindParam(5, $_POST['product_price']);
$stmt->bindParam(6, $_POST['product_price_discount']);
$stmt->bindParam(7, $_POST['product_cost']);
$stmt->bindParam(8, $_POST['product_stock']);
$stmt->bindParam(9, $_POST['product_id']);
$stmt->execute();

echo "<pre>" . $_POST['product_id'] . "</pre>";
echo "<pre>" . $_POST['product_name'] . "</pre>";
echo "<pre>" . $_POST['product_type'] . "</pre>";
echo "<pre>" . $_POST['product_potent'] . "</pre>";
echo "<pre>" . $_POST['product_amount'] . "</pre>";
echo "<pre>" . $_POST['product_price'] . "</pre>";
echo "<pre>" . $_POST['product_price_discount'] . "</pre>";
echo "<pre>" . $_POST['product_cost'] . "</pre>";
echo "<pre>" . $_POST['product_stock'] . "</pre>";
