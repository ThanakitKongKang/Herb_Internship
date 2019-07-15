<?php
include "connect.php";
$listOrdDetail = $pdo->prepare("SELECT * FROM  order_detail , order_history ,product 
WHERE order_detail.order_id = order_history.order_id 
AND order_detail.product_id = product.product_id
AND order_history.order_id = ?
AND order_history.status = 'uncancelled'
");
$listOrdDetail->bindParam(1, $_GET["ord"]);
$listOrdDetail->execute();
$i = 1;
$count = 0;
$sum = 0;
while ($rowListOrdDetail = $listOrdDetail->fetch()) {
    if ($listOrdDetail->rowCount() > 0 && $i == 1) {
        echo '<div class="mt-3">รายการสินค้าในออร์เดอร์ที่ : ' . $rowListOrdDetail['order_id'];
        echo '<span style="float:right">' . $rowListOrdDetail['order_date'] . '</span> </div>';
        echo '<div>เล่ม/เลขที่ : <span id="book_iv">' . $rowListOrdDetail['book_id'] . '/' . $rowListOrdDetail['iv_id'] . '</span></div>';
        echo '<div class="row mt-3"><table class="table table-hover">
        <thead class="thead-dark"><tr><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคาที่ขาย</th><th>จำนวน</th><th>รวม</th><tr></thead><tbody>';
    }
    echo '<tr><td>' . $rowListOrdDetail['product_id'] . '</td>';
    echo '<td>' . $rowListOrdDetail['product_name'] . '</td>';
    echo '<td>' . $rowListOrdDetail['order_price'] . '</td>';
    echo '<td>' . $rowListOrdDetail['order_count'] . '</td>';
    echo '<td>' . $rowListOrdDetail['order_price'] * $rowListOrdDetail['order_count'] . '</td>';
    echo '</tr>';
    $i++;
    $count += $rowListOrdDetail['order_count'];
    $sum += $rowListOrdDetail['order_price'] * $rowListOrdDetail['order_count'];
}
if ($listOrdDetail->rowCount() > 0) {
    echo '</tbody><tfoot class="bg-dark text-white">';
    echo '<tr><td colspan="3">รวมทั้งสิ้น</td><td>' . $count . '</td><td>' . $sum . '</td></tr>';
    echo '</tfoot>';
    echo '</table></div>';
} else {
    echo '<h3 class="mt-5 text-center text-danger">ออร์เดอร์นี้ถูกยกเลิกไปแล้ว</h1>';
}
