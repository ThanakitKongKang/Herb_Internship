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


// if (isset($_GET['mode']) && $_GET['mode'] != 'date') {
//     $listSummaryDay = $pdo->prepare("SELECT order_detail.product_id,product.product_name,sum(order_count) as order_count,order_cost,sum(order_count*order_price - order_cost) as profit 
// FROM `order_detail`,`product`,order_history 
// WHERE product.product_id=order_detail.product_id 
// AND order_history.order_id = order_detail.order_id
// AND order_history.order_date LIKE ?
// GROUP by order_detail.product_id  
// ORDER BY `product_id` ASC");
//     if (isset($_GET['mode']) && $_GET['mode'] == 'day') {
//         $time = date('Y-m-d', time());
//         echo "<h1 class='text-center text-white my-3'>สรุปผลประกอบการ ประจำ<span class='text-warning'>วันที่ " . $day . " เดือน " . $month . " ปี " . $year . "</span></h1>";
//     } else if (isset($_GET['mode']) && $_GET['mode'] == 'month') {
//         $time = date('Y-m', time());
//         echo "<h1 class='text-center text-white my-3'>สรุปผลประกอบการ ประจำ<span class='text-warning'>เดือน" . $month . " ปี " . $year . "</span></h1>";
//     } else if (isset($_GET['mode']) && $_GET['mode'] == 'year') {
//         $time = date('Y', time());
//         echo "<h1 class='text-center text-white my-3'>สรุปผลประกอบการ ประจำ<span class='text-warning'>ปี " . $year . "</span></h1>";
//     }


//     $time = $time . '%';
//     $listSummaryDay->bindParam(1, $time);
//     $listSummaryDay->execute();
// }
    if (isset($_GET['mode']) && $_GET['mode'] == 'date') {
        if (!isset($_GET['date2'])) {
            $listSummaryDay = $pdo->prepare("SELECT order_detail.product_id,product.product_name,sum(order_count) as order_count,order_cost,ROUND(sum(order_count*order_price - order_cost),2) as profit
        FROM `order_detail`,`product`,order_history 
        WHERE product.product_id=order_detail.product_id 
        AND order_history.order_id = order_detail.order_id
        AND order_history.order_date LIKE ?
        AND product.product_type = ?
        AND order_history.status = 'uncancelled'
        GROUP by order_detail.product_id  
        ORDER BY `profit` DESC");

            echo "<h1 class='text-center text-white my-3'>สรุปผลประกอบการ ".$_GET['page']." <span class='text-warning'>" . $_GET['date1'] . "</span></h1>";
            $_GET['date1'] = $_GET['date1'] . '%';
            $listSummaryDay->bindParam(1, $_GET['date1']);
            $listSummaryDay->bindParam(2, $_GET['page']);
            $listSummaryDay->execute();
        } else {
            $listSummaryDay = $pdo->prepare("SELECT order_detail.product_id,product.product_name,sum(order_count) as order_count,order_cost,ROUND(sum(order_count*order_price - order_cost),2) as profit
        FROM `order_detail`,`product`,order_history 
        WHERE product.product_id=order_detail.product_id 
        AND order_history.order_id = order_detail.order_id
        AND order_history.order_date BETWEEN ? AND ?
        AND product.product_type = ?
        AND order_history.status = 'uncancelled'
        GROUP by order_detail.product_id  
        ORDER BY `profit` DESC");

            echo "<h2 class='text-center text-white my-3'>สรุปผลประกอบการ ".$_GET['page']." ระหว่าง <span class='text-warning'>" . $_GET['date1'] . " <span class='text-white'>ถึง</span> " . $_GET['date2'] . "</span></h2>";
            echo "<pre class='text-light text-center'>ตั้งแต่ " . $_GET['date1'] . " 00:00:00 ถึง " . $_GET['date2'] . " 23:59:59</pre>";
            $_GET['date2'] = $_GET['date2'] . " 23:59:59.999";
            $listSummaryDay->bindParam(1, $_GET['date1']);
            $listSummaryDay->bindParam(2, $_GET['date2']);
            $listSummaryDay->bindParam(3, $_GET['page']);
            $listSummaryDay->execute();
        }
    }


$sumCount = 0;
$sumProfit = 0;
$i = 0;
while ($rowSummaryDay = $listSummaryDay->fetch()) {
    if ($listSummaryDay->rowCount() > 0 && $i == 0) {
        echo "<table border='1' id='the-table' class='table table-hover table-light table-bordered' ><thead class='thead-dark'><tr><th  class='text-center align-middle'>รหัสสินค้า</th><th class='align-middle'>ชื่อสินค้า</th><th  class='text-center align-middle'>จำนวนที่ขายได้</th><th>กำไร<br><span class='text-secondary' style='font-size:0.75em'>(บาท)</span></th></tr></thead><tbody>";
    }
    $sumCount += $rowSummaryDay['order_count'];
    $sumProfit += $rowSummaryDay['profit'];
    echo '<tr><td class="text-center">' . $rowSummaryDay['product_id'] . '</td><td>' . $rowSummaryDay['product_name'] . '</td><td class="text-center">' . $rowSummaryDay['order_count'] . '</td>';
    echo  '<td style="text-align:right">' . $rowSummaryDay['profit'] . '</td></tr>';
    $i++;
}
if ($i != 0) {
    echo "</tbody></table>";
    echo "<div id='footer-summary'><h3 class='text-white mt-3'>จำนวนที่ขายได้รวม : <span style='text-shadow: 0px 0.5px 0.5px black;'>" . $sumCount . "</span> ชิ้น</h3>";
    echo "<h3 class='text-white' style='margin-bottom:10rem'>กำไรรวม : <span style='text-shadow: 0px 0.5px 0.5px black;'>" . $sumProfit . "</span> บาท</h3></div>";
} else {
    echo "<h1 class='text-center'>ไม่พบข้อมูลการขาย</h1>";
}
