<?php
include "connect.php";
date_default_timezone_set('Asia/Bangkok');
$timezone = date_default_timezone_get();
$year = date('Y', time()) + 543;
$month = date('m', time());
$day = date('d', time());
switch ($month) {
    case "01":
        $month = " มกราคม";
        break;
    case "02":
        $month = "กุมภาพันธ์";
        break;
    case "03":
        $month = "มีนาคม";
        break;
    case "04":
        $month = "เมษายน";
        break;
    case "05":
        $month = "พฤษภาคม";
        break;
    case "06":
        $month = "มิถุนายน";
        break;
    case "07":
        $month = "กรกฎาคม";
        break;
    case "08":
        $month = "สิงหาคม";
        break;
    case "09":
        $month = "กันยายน";
        break;
    case "10":
        $month = "ตุลาคม";
        break;
    case "11":
        $month = "พฤศจิกายน";
        break;
    case "12":
        $month = "ธันวาคม";
        break;
}

if (isset($_GET['mode']) && $_GET['mode'] == 'date') {
    if (!isset($_GET['date2'])) {
        $listStock = $pdo->prepare("SELECT stock_id,stock_date,stock_detail.product_id,product.product_name,SUM(stock_detail.stock) as sum_stock
        FROM stock_detail,product
        WHERE product.product_id=stock_detail.product_id 
        AND stock_date LIKE ?
        GROUP by stock_detail.product_id");

        echo "<h1 class='text-center text-white my-3'>สรุปผลการนำเข้าสินค้า <span class='text-warning'>" . $_GET['date1'] . "</span></h1>";
        $_GET['date1'] = $_GET['date1'] . '%';
        $listStock->bindParam(1, $_GET['date1']);
        $listStock->execute();

    } else {
        $listStock = $pdo->prepare("SELECT stock_id,stock_date,stock_detail.product_id,product.product_name,SUM(stock_detail.stock) as sum_stock
        FROM stock_detail,product
        WHERE product.product_id=stock_detail.product_id 
        AND stock_date BETWEEN ? AND ?
        GROUP by stock_detail.product_id");

        echo "<h1 class='text-center text-white my-3'>สรุปการนำเข้าสินค้าระหว่าง <span class='text-warning'>" . $_GET['date1'] . " <span class='text-white'>ถึง</span> " . $_GET['date2'] . "</span></h1>";
        echo "<pre class='text-light text-center'>ตั้งแต่ " . $_GET['date1'] . " 00:00:00 ถึง " . $_GET['date2'] . " 23:59:59</pre>";
        $_GET['date2'] = $_GET['date2'] . " 23:59:59.999";
        $listStock->bindParam(1, $_GET['date1']);
        $listStock->bindParam(2, $_GET['date2']);
        $listStock->execute();
    }
}

$i = 0;
while ($rowStock = $listStock->fetch()) {
    if ($listStock->rowCount() > 0 && $i == 0) {
        echo "<table border='1' class='table table-hover table-light table-bordered'><thead class='thead-dark'><tr><th  class='text-center align-middle'>รหัสสินค้า</th><th class='align-middle'>ชื่อสินค้า</th><th  class='text-center align-middle'>จำนวนที่นำเข้า</th></tr></thead><tbody>";
    }
    echo '<tr>
        <td class="text-center">' . $rowStock['product_id'] . '</td>
        <td class="text-center">' . $rowStock['product_name'] . '</td>
        <td class="text-center">' . $rowStock['sum_stock'] . '</td>
        </tr>';
    $i++;
}
if ($i != 0) {
    echo "</tbody></table>";
    // echo "<h3 class='text-white mt-3'>จำนวนที่ขายได้รวม : <span style='text-shadow: 0px 0.5px 0.5px black;'>" . $sumCount . "</span> ชิ้น</h3>";
    // echo "<h3 class='text-white' style='margin-bottom:10rem'>กำไรรวม : <span style='text-shadow: 0px 0.5px 0.5px black;'>" . $sumProfit . "</span> บาท</h3>";
} else {
    echo "<h1 class='text-center'>ไม่พบข้อมูล</h1>";
}
