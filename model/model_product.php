<?php
if (isset($_GET['command']) && $_GET['command'] == 'getListProduct') {
    getListProduct($pdo, "");
}

function getListProduct($pdo, $page)
{
    if ($page == 'product_add_stock') {
        $listProduct = $pdo->prepare("SELECT * FROM product WHERE product_status = 'ขาย'");
        $listProduct->execute();
    } else if ($page == 'index') {
        $listProduct = $pdo->prepare("SELECT * FROM product WHERE product_status = 'ขาย'");
        $listProduct->execute();
    } else if ($page == 'product_edit') {

        $listProduct = $pdo->prepare("SELECT * FROM product ORDER BY product_status");
        $listProduct->execute();
    }
    return $listProduct;
}
function getLastProductAdded($pdo)
{
    $lastProduct = $pdo->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT 1");
    $lastProduct->execute();
    return $lastProduct;
}
