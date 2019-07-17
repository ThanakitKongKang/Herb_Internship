<?php
include "connect.php";


$listOrdDetail = $pdo->prepare("SELECT * FROM  order_detail , order_history ,product 
WHERE order_detail.order_id = order_history.order_id 
AND order_detail.product_id = product.product_id
AND order_history.order_id = ?
");
$listOrdDetail->bindParam(1, $_GET["ord"]);
$listOrdDetail->execute();


$i = 1;
$count = 0;
$sum = 0;
date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
while ($rowListOrdDetail = $listOrdDetail->fetch()) {
    if ($listOrdDetail->rowCount() > 0 && $i == 1) {
        $date = date_create($rowListOrdDetail['order_date']);
        $dayDisplay = $date->format('d');
        $yearDisplay = $date->format('Y');
        $yearDisplay += 543;
        $monthDisplay = $date->format('m');
        $time = $date->format('H:i');
        switch ($monthDisplay) {
            case "01":
                $monthDisplay = "มกราคม";
                break;
            case "02":
                $monthDisplay = "กุมภาพันธ์";
                break;
            case "03":
                $monthDisplay = "มีนาคม";
                break;
            case "04":
                $monthDisplay = "เมษายน";
                break;
            case "05":
                $monthDisplay = "พฤษภาคม";
                break;
            case "06":
                $monthDisplay = "มิถุนายน";
                break;
            case "07":
                $monthDisplay = "กรกฎาคม";
                break;
            case "08":
                $monthDisplay = "สิงหาคม";
                break;
            case "09":
                $monthDisplay = "กันยายน";
                break;
            case "10":
                $monthDisplay = "ตุลาคม";
                break;
            case "11":
                $monthDisplay = "พฤศจิกายน";
                break;
            case "12":
                $monthDisplay = "ธันวาคม";
                break;
        }
        $cancelled = "";
        $cancelled_text = "";
        if ($rowListOrdDetail['status'] == 'cancelled') {
            $cancelled = "opacity:0.75";
            $cancelled_text = "<h3 class='mt-5 text-center text-danger' id='order_cancelled'>ออร์เดอร์นี้ถูกยกเลิกไปแล้ว</h3>";
        }
        echo $cancelled_text;
        echo '<div style="' . $cancelled . '"><div class="mt-3">รายการสินค้าในออร์เดอร์ที่ : ' . $rowListOrdDetail['order_id'];
        echo '<span style="float:right">วันที่ ' . $dayDisplay . ' ' . $monthDisplay . ' ' . $yearDisplay . ' ' . $time . ' น.</span> </div>';
        echo '<div>เล่ม/เลขที่ : <span id="book_iv">' . $rowListOrdDetail['book_id'] . '/' . $rowListOrdDetail['iv_id'] . '</span></div>';
        echo '<div class="row mt-3"><table class="table table-hover">
        <thead class="thead-dark"><tr><th>รหัสสินค้า</th><th>ชื่อสินค้า</th><th>ราคาที่ขาย</th><th>จำนวน</th><th>รวม (บาท)</th><tr></thead><tbody>';
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
    echo '</table></div></div>';
} else {
    echo '<h3 class="mt-5 text-center text-danger">ออร์เดอร์นี้ถูกยกเลิกไปแล้ว</h3>';
}
