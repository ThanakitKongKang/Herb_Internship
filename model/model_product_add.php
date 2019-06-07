<?php 
include "connect.php";
$stmt = $pdo->prepare("INSERT INTO product VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?, ?) ");
$stmt->bindParam(1, $_POST['product_name']);
$stmt->bindParam(2, $_POST['product_type']);
$stmt->bindParam(3, $_POST['product_potent']);
$stmt->bindParam(4, $_POST['product_amount']);
$stmt->bindParam(5, $_POST['product_price']);
$stmt->bindParam(6, $_POST['product_price_discount']);
$stmt->bindParam(7, $_POST['product_cost']);
$stmt->bindParam(8, $_POST['product_stock']);
$stmt->execute(); 

?>