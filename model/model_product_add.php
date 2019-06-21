<?php
include "connect.php";
$lastProduct = $pdo->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT 1");
$lastProduct->execute();
$rowLastProduct = $lastProduct->fetch();

$newProduct_id = $rowLastProduct["product_id"];
// ถ้าไม่มีสินค้าเลย สินค้าแรกจะรหัส 001
if ($newProduct_id == null) {
    $newProduct_id = "001";
} else {
    $newProduct_id++;
    // หลักจากบวกแล้วเช็คจำนวนหลัก ถ้ามีแค่หลักหน่วยให้เพิ่ม 00 ข้างหน้า
    if (strlen($newProduct_id) == 1) {
        $newProduct_id = "00" . $newProduct_id;
        // หลักจากบวกแล้วเช็คจำนวนหลัก ถ้ามี 2 หลัก ให้เพิ่ม 0 ข้างหน้า
    } else if (strlen($newProduct_id) == 2) {
        $newProduct_id = "0" . $newProduct_id;
    }
}
$product_status = "ขาย";
$stmt = $pdo->prepare("INSERT INTO product VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
$stmt->bindParam(1, $newProduct_id);
$stmt->bindParam(2, $_POST['product_name']);
$stmt->bindParam(3, $_POST['product_type']);
$stmt->bindParam(4, $_POST['product_potent']);
$stmt->bindParam(5, $_POST['product_amount']);
$stmt->bindParam(6, $_POST['product_price']);
$stmt->bindParam(7, $_POST['product_price_discount']);
$stmt->bindParam(8, $_POST['product_cost']);
$stmt->bindParam(9, $_POST['product_stock']);
$stmt->bindParam(10, $product_status);
$stmt->execute();

echo "<pre>".$newProduct_id."</pre>";
echo "<pre>".$_POST['product_name']."</pre>";
echo "<pre>".$_POST['product_type']."</pre>";
echo "<pre>".$_POST['product_potent']."</pre>";
echo "<pre>".$_POST['product_amount']."</pre>";
echo "<pre>".$_POST['product_price']."</pre>";
echo "<pre>".$_POST['product_price_discount']."</pre>";
echo "<pre>".$_POST['product_cost']."</pre>";
echo "<pre>".$_POST['product_stock']."</pre>";
