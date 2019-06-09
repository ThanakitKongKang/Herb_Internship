<?php
include "connect.php";
$getListProduct = $pdo->prepare("SELECT * FROM product");
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
        <a href="#" class="add-to-cart btn btn-success text-white" title="เพิ่มลงตะกร้า" 
        data-product_id="' . $rowListProduct['product_id'] . '"
        data-product_name="' . $rowListProduct['product_name'] . '"
        data-product_type="' . $rowListProduct['product_type'] . '"
        data-product_potent="' . $rowListProduct['product_potent'] . '"
        data-product_amount="' . $rowListProduct['product_amount'] . '"
        data-product_cost="' . $rowListProduct['product_cost'] . '"
        data-product_price="' . $rowListProduct['product_price'] . '"
        data-product_price_discount="' . $rowListProduct['product_price_discount'] . '"
        data-product_stock="' . $rowListProduct['product_stock'] . '">
        <i class="fas fa-plus"></i></a></th>
    </tr>';
}
