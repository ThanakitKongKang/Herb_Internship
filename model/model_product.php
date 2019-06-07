<?php 
function getListProduct($pdo){
    $listProduct = $pdo->prepare("SELECT * FROM product");
    $listProduct->execute();
    return $listProduct;
}

?>