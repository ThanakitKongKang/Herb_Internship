<?php

if (isset($_GET['command']) && $_GET['command'] == 'getListProduct') {
    getListProduct($pdo);
}

function getListProduct($pdo)
{
    $listProduct = $pdo->prepare("SELECT * FROM product");
    $listProduct->execute();
    return $listProduct;
}
function getLastProductAdded($pdo)
{
    $lastProduct = $pdo->prepare("SELECT * FROM product ORDER BY product_id DESC LIMIT 1");
    $lastProduct->execute();
    return $lastProduct;
}
