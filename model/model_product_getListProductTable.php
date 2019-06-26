<?php
include "connect.php";
session_start();


if (isset($_GET["page"]) && $_GET["page"] == "product_add_stock") {
    $getListProduct = $pdo->prepare("SELECT * FROM product WHERE product_status = 'ขาย'");
    $getListProduct->execute();
    while ($rowListProduct = $getListProduct->fetch()) {
        echo '<tr>
        <td class="text-center">' . $rowListProduct['product_id'] . '</td>
        <td>' . $rowListProduct['product_name'] . '</td>
        <td class="text-center">' . $rowListProduct['product_type'] . '</td>
        <td>' . $rowListProduct['product_potent'] . '</td>
        <td>' . $rowListProduct['product_amount'] . '</td>
        <td class="text-center">' . $rowListProduct['product_price'] . '</td>
        <td>' . $rowListProduct['product_stock'] . '</td>
        <th data-product_id="' . $rowListProduct['product_id'] . '"
        data-product_name="' . $rowListProduct['product_name'] . '"
        data-product_type="' . $rowListProduct['product_type'] . '"
        data-product_potent="' . $rowListProduct['product_potent'] . '"
        data-product_amount="' . $rowListProduct['product_amount'] . '"
        data-product_cost="' . $rowListProduct['product_cost'] . '"
        data-product_price="' . $rowListProduct['product_price'] . '"
        data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
        data-product_stock="' . $rowListProduct['product_stock'] . '">
            <a href="#" class="add-to-cart btn btn-info text-white" title="เพิ่มลงตะกร้า">
            <i class="fas fa-plus"></i></a></th>
        </tr>';
    }
} else if (isset($_GET["page"]) && $_GET["page"] == "product_edit") {
    $getListProduct = $pdo->prepare("SELECT * FROM product ORDER BY product_status");
    $getListProduct->execute();
    while ($rowListProduct = $getListProduct->fetch()) {
        $status ='';
        if ($rowListProduct['product_status'] == 'เลิกขาย') $status = "style='background-color:#f27474bf';";
        echo '<tr ' . $status . '>
        <td class="text-center">' . $rowListProduct['product_id'] . '</td>
        <td>' . $rowListProduct['product_name'] . '</td>
        <td class="text-center">' . $rowListProduct['product_type'] . '</td>
        <td>' . $rowListProduct['product_potent'] . '</td>
        <td>' . $rowListProduct['product_amount'] . '</td>
        <td class="text-center">' . $rowListProduct['product_price'] . '</td>
        <td>' . $rowListProduct['product_stock'] . '</td>
        <td class="text-center">' . $rowListProduct['product_status'] . '</td>
        <th data-product_id="' . $rowListProduct['product_id'] . '"
        data-product_name="' . $rowListProduct['product_name'] . '"
        data-product_type="' . $rowListProduct['product_type'] . '"
        data-product_potent="' . $rowListProduct['product_potent'] . '"
        data-product_amount="' . $rowListProduct['product_amount'] . '"
        data-product_cost="' . $rowListProduct['product_cost'] . '"
        data-product_price="' . $rowListProduct['product_price'] . '"
        data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
        data-product_status="' . $rowListProduct['product_status'] . '"
        data-product_stock="' . $rowListProduct['product_stock'] . '">
            <a href="#" class="show-edit-modal btn btn-warning text-white" title="แก้ไขสินค้าชิ้นนี้">
            <i class="fas fa-edit"></i></a></th>
        </tr>';
    }
} else {
    $getListProduct = $pdo->prepare("SELECT * FROM product WHERE product_status = 'ขาย'");
    $getListProduct->execute();
    while ($rowListProduct = $getListProduct->fetch()) {
        echo '<tr>
    <td class="text-center">' . $rowListProduct['product_id'] . '</td>
    <td>' . $rowListProduct['product_name'] . '</td>
    <td class="text-center">' . $rowListProduct['product_type'] . '</td>
    <td>' . $rowListProduct['product_potent'] . '</td>
    <td>' . $rowListProduct['product_amount'] . '</td>
    <td class="text-center">' . $rowListProduct['product_price'] . '</td>
    <td>' . $rowListProduct['product_stock'] . '</td>
    <th data-product_id="' . $rowListProduct['product_id'] . '"
    data-product_name="' . $rowListProduct['product_name'] . '"
    data-product_type="' . $rowListProduct['product_type'] . '"
    data-product_potent="' . $rowListProduct['product_potent'] . '"
    data-product_amount="' . $rowListProduct['product_amount'] . '"
    data-product_cost="' . $rowListProduct['product_cost'] . '"
    data-product_price="' . $rowListProduct['product_price'] . '"
    data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
    data-product_stock="' . $rowListProduct['product_stock'] . '">
        <a href="#" class="add-to-cart btn btn-success text-white" title="เพิ่มลงตะกร้า">
        <i class="fas fa-plus"></i></a></th>
    </tr>';
    }
}
