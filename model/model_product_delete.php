<?php
include "connect.php";
$stmt = $pdo->prepare("DELETE FROM product WHERE product_id = ?");
$stmt->bindParam(1, $_POST['product_id']);
$stmt->execute();

echo "<pre>" . $_POST['product_id'] . "</pre>";
